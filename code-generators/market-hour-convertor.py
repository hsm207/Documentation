from pathlib import Path
import os
import shutil

root_dir = "Resources/datasets/market-hours/"
target_dir = "02 Writing Algorithms/03 Securities/99 Asset Classes/"
conversions = {
    "future": "07 Futures/04 Market Hours",
    "cfd": "11 CFD/04 Market Hours"
}
page_order = {
    "introduction.html": 0,
    "pre-market-hours.html": 1,
    "market-opening-hours.html": 2,
    "post-market-hours.html": 3,
    "holidays.html": 4,
    "early-closes.html": 5,
    "late-opens.html": 6,
    "time-zone.html": 7
}

for dir, target in conversions.items():
    path = Path(f'{root_dir}{dir}')
    subdirs = sorted([str(subdir.name).upper() for subdir in path.iterdir() if subdir.is_dir()])
    
    target_path = Path(f"{target_dir}{target}")
    if os.path.exists(target_path):
        shutil.rmtree(target_path)
    target_path.mkdir(parents=True, exist_ok=True)
    
    i = 11
    
    if dir != "cfd":
        with open(target_path / "00.json", "w", encoding="utf-8") as json:
            content_dict = {f"{count+11:02}": "" for count in range(len(subdirs))}
            json.write('''{
  "type" : "landing",
  "heading" : "Market Hours",
  "subHeading" : "",
  "content" : "<p>Market hours of different exchanges.</p>",
  "alsoLinks" : [],
  "featureShortDescription": ''')
            json.write(str(content_dict).replace("'", '"'))
            json.write("}")
    
    else:
        j = 1

        ref_pages = sorted((path / "generic").glob('*.html'), key=lambda x: page_order[x.name])
        for html in ref_pages:
            page_name = str(html.name).replace('-', ' ').title()
            
            codes = open(html).read()
            with open(f'{target_dir}{target}/{j:02} {page_name.replace("Html", "html")}', 'w', encoding='utf-8') as html_file:
                html_file.write(codes)
            
            j += 1
            
        codes = open(f'{root_dir}{dir.title()}.html').read()
        
        if "a href" in codes:
            with open(f'{target_dir}{target}/{j:02} Supported Assets.html', 'w', encoding='utf-8') as html_file:
                html_file.write(f"""<!-- Code generated by market-hour-convertor.py -->
<p>The following table shows the available contracts in the CFD market. Some of these contracts may have different trading periods than the overall CFD market.</p>
""")
                
                lines = [x for x in codes.split("\n") if "a href" in x]
                sorted_lines = sorted(lines, key=lambda x: x.split("</a>")[0].split(">")[-1])
                
                html_file.write('''<table class="table qc-table table-reflow">
<thead>
<tr><th>Symbol</th><th>Contract</th></tr>
</thead>
<tbody>
''' + '\n'.join(sorted_lines) + '''
</tbody>
</table>''')
    
    for subdir in subdirs:
        if subdir == "FXCM" or subdir == "GENERIC": continue
        
        market_dir = path / subdir.lower() if dir != "cfd" else path / subdir.upper()
        output_dir = Path(f'{target_dir}{target}/{i:02} {subdir}')
        output_dir.mkdir(parents=True, exist_ok=True)
        
        j = 1

        ref_pages = sorted((market_dir / 'generic').glob('**/*.html'), key=lambda x: page_order[x.name]) if dir != "cfd" else sorted(market_dir.glob('*.html'), key=lambda x: page_order[x.name])
        for html in ref_pages:
            page_name = str(html.name).replace('-', ' ').title()
            
            codes = open(html).read()
            with open(output_dir / f'{j:02} {page_name.replace("Html", "html")}', 'w', encoding='utf-8') as html_file:
                html_file.write(codes)
            
            j += 1
            
        codes = open(f'{root_dir}{dir.title()}.html').read().split(f'<h4>{subdir.upper()}</h4>')[-1].split('</table>')[0].split('</h4>')[-1] + '</table>'
        
        if dir != "cfd" and "a href" in codes:
            asset_path = output_dir / f'{j:02} Supported Assets.html' 
            with open(asset_path, 'w', encoding='utf-8') as html_file:
                html_file.write(f"""<!-- Code generated by market-hour-convertor.py -->
<p>The following table shows the available contracts in the {subdir.upper()} {dir.title()} market. Some of these contracts may have different trading periods than the overall {subdir.upper()} {dir.title()} market.</p>
""")
                html_file.write(codes)
            
        assets_subdirs = sorted([str(subdir2.name).upper() for subdir2 in market_dir.iterdir() if subdir2.is_dir() and subdir2.name != "generic"])
        
        k = 11
        
        for asset in assets_subdirs:
            contract_name = asset.replace("__", " ").replace("_", " ").upper()
            raw_asset_dir = market_dir / asset.upper()
            asset_dir = output_dir/ f'{k:02} {contract_name}'
            asset_dir.mkdir(parents=True, exist_ok=True)
        
            n = 1
            
            for html in sorted(raw_asset_dir.glob('**/*.html'), key=lambda x: page_order[x.name]):
                page_name = str(html.name).replace('-', ' ').title()

                codes = open(html).read()
                with open(asset_dir / f'{n:02} {page_name.replace("Html", "html")}', 'w', encoding='utf-8') as html_file:
                    html_file.write(codes)
                
                n += 1
                
            k += 1
            
        i += 1
