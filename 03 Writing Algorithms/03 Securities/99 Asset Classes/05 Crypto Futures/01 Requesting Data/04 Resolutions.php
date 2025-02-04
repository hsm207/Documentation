<?php echo file_get_contents(DOCS_RESOURCES."/securities/resolutions/crypto-futures.html"); ?>

<p>The default resolution for Crypto Futures subscriptions is <code>Resolution.Minute</code>. To change the resolution, pass a <code>resolution</code> argument to the <code>AddCryptoFuture</code> method.</p>

<div class="section-example-container">
    <pre class="csharp">_symbol = AddCryptoFuture("BTCUSD", Resolution.Daily).Symbol;</pre>
    <pre class="python">self.symbol = self.AddCryptoFuture("BTCUSD", Resolution.Daily).Symbol</pre>
</div>

<p>To create custom resolution periods, see <a href="/docs/v2/writing-algorithms/consolidating-data/getting-started">Consolidating Data</a>.</p>