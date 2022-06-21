<p>Custom universes should extend the <code class="csharp">BaseData</code><code class="python">PythonData</code> class. Extensions of the <code class="csharp">BaseData</code><code class="python">PythonData</code> class must implement a <code>GetSource</code> and <code>Reader</code> method. <br></p>

<p>The <code>GetSource</code> method in your custom data class instructs LEAN where to find the data. This method must return a <code>SubscriptionDataSource</code> object, which contains the data location and format (<code>SubscriptionTransportMedium</code>). You can even change source locations for backtesting and live modes. We support many different data sources.</p>

<p>The <code>Reader</code> method of your custom data class takes one line of data from the source location and parses it into one of your custom objects. You can add as many properties to your custom data objects as you need, but must set <code>Symbol</code> and <code>EndTime</code> properties. When there is no useable data in a line, the method should return <code class="csharp">null</code><code class="python">None</code>. LEAN repeatedly calls the <code>Reader</code> method until the date/time advances or it reaches the end of the file. <br></p>
<div class="section-example-container">
<pre class="csharp">//Example custom universe data; it is virtually identical to other custom data types.
public class MyCustomUniverseDataClass : BaseData 
{
    public int CustomAttribute1;
    public decimal CustomAttribute2;
    public override DateTime EndTime {
        // define end time as exactly 1 day after Time
	    get { return Time + QuantConnect.Time.OneDay; }
	    set { Time = value - QuantConnect.Time.OneDay; }
    }

    public override SubscriptionDataSource GetSource(SubscriptionDataConfig config, DateTime date, bool isLiveMode) {
        return new SubscriptionDataSource(@"your-remote-universe-data", SubscriptionTransportMedium.RemoteFile);
    }

    public override BaseData Reader(SubscriptionDataConfig config, string line, DateTime date, bool isLiveMode) {
        var items = line.Split(",");

        // Generate required data, then return an instance of your class.
        return new MyCustomUniverseDataClass {
            Symbol = Symbol.Create(items[0], SecurityType.Crypto, Market.Bitfinex),
            Time = date,
            CustomAttribute1 = int.Parse(items[1]),
            CustomAttribute2 = decimal.Parse(items[2], NumberStyles.Any, CultureInfo.InvariantCulture)
        };
    }
}
</pre>
<pre class="python"># Example custom universe data; it is virtually identical to other custom data types.
class MyCustomUniverseDataClass(PythonData):

    def GetSource(self, config: SubscriptionDataConfig, date: datetime, isLiveMode: bool) -&gt; SubscriptionDataSource:
        return SubscriptionDataSource(@"your-remote-universe-data", SubscriptionTransportMedium.RemoteFile)

    def Reader(self, config: SubscriptionDataConfig, line: str, date: datetime, isLiveMode: bool) -&gt; BaseData:
        items = line.split(",")
    
        # Generate required data, then return an instance of your class.
        data = MyCustomUniverseDataClass()
        data.Time = date
        # define end time as exactly 1 day after Time
        data.EndTime = data.Time + timedelta(1)
        data.Symbol = Symbol.Create(items[0], SecurityType.Crypto, Market.Bitfinex)
        data["CustomAttribute1"] = int(items[1])
        data["CustomAttribute2"] = float(items[2])
        return data
</pre>
</div>

<?php echo file_get_contents(DOCS_RESOURCES."/datasets/custom-data/reader-method.html"); ?>

<div class="section-example-container">
<pre class="csharp">// Example</pre>
<pre class="python"># Example</pre>
</div>
