<p>The brokerage model of your algorithm automatically sets the margin interest rate model for each security, but you can override it. To manually set the margin interest rate model of a security, assign a model to the <code>MarginInterestRateModel</code> property of the Security object.</p>
<div class="section-example-container">
    <pre class="csharp">// In Initialize
var security = AddEquity("SPY");
security.MarginInterestRateModel = MarginInterestRateModel.Null;</pre>
    <pre class="python"># In Initialize
security = self.AddEquity("SPY")
security.MarginInterestRateModel = MarginInterestRateModel.Null</pre>
</div>

<p>You can also set the margin interest rate model in a security initializer. If your algorithm has a dynamic universe, use the security initializer technique. In order to initialize single security subscriptions with the security initializer, call <code>SetSecurityInitializer</code> before you create the subscriptions.</p><p>

</p><div class="section-example-container">
<pre class="csharp">// In Initialize
SetSecurityInitializer(CustomSecurityInitializer);
AddEquity("SPY");

private void CustomSecurityInitializer(Security security)
{
    security.MarginInterestRateModel = MarginInterestRateModel.Null;
}</pre>
<pre class="python"># In Initialize
self.SetSecurityInitializer(self.CustomSecurityInitializer)
self.AddEquity("SPY")

def CustomSecurityInitializer(self, security: Security) -&gt; None:
    security.MarginInterestRateModel = MarginInterestRateModel.Null</pre>
</div>

<?php echo file_get_contents(DOCS_RESOURCES."/reality-modeling/security-initializers.html");?>

<p>To extend upon the default security initializer instead of overwriting it, create a custom <code>BrokerageModelSecurityInitializer</code>.</p>

<?php
include(DOCS_RESOURCES."/reality-modeling/brokerage-mondel-security-init.php");
$overwriteCodePy = "security.MarginInterestRateModel = MarginInterestRateModel.Null";
$overwriteCodeC = "security.MarginInterestRateModel = MarginInterestRateModel.Null;";
$getBrokerageModelInitCodeBlock($overwriteCodePy, $overwriteCodeC);
?>

<p>To view all the pre-built margin interest rate models, see <a href='/docs/v2/writing-algorithms/reality-modeling/margin-interest-rate/supported-models'>Supported Models</a>.</p>