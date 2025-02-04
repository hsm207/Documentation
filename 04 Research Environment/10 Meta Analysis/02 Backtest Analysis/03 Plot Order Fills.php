<p>Follow these steps to plot the daily order fills of a backtest:</p>

<ul>
    <li>Get the backtest orders.</li>
    <div class="section-example-container">
	    <pre class="python">orders = api.ReadBacktestOrders(project_id, backtest_id)</pre>
	</div>
	<?php include(DOCS_RESOURCES."/qc-api/get-project-id-in-research.html"); ?>
	<?php include(DOCS_RESOURCES."/qc-api/get-backtest-id-in-research.html"); ?>
	<p>The <code>ReadBacktestOrders</code> method returns a list of <code>Order</code> objects, which have the following properties:</p>
	<div data-tree='QuantConnect.Orders.Order'></div>

	<?php include(DOCS_RESOURCES."/qc-api/plot-fills.php"); ?>
</ul>





