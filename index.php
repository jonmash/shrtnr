<!DOCTYPE html>
<html>
<title>SHRTNR - Shorten your URL</title>
<meta name="viewport" content="width=device-width">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<meta name="description" content="Shorten your URL.">
<meta name="keywords" content="URL, shortener, shrtnr">
<meta name="author" content="Jonathan Mash">
<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/style.css" />

<body>
	<form method="post" action="shrtn.php" id="shrtnr">
		<h1>shrtnr</h1>
		<h2>shorten your url</h2>
		<input type="text" placeholder="http://" name="lngurl" id="lngurl" value="Shorten your URL"> <br />
		<br />
		<div id="afterreturn" style="display: none; text-align: center;"></div>
		<input id="button" type="submit" value="Shrtn" >
	</form>

	<br /><br /><br /><br />


	<a class="ftr" href="https://ca.linkedin.com/in/jonmash/" target="_blank">LinkedIn</a>-<a class="ftr" href="https://plus.google.com/114221103876090917638">Google+</a>-<a class="ftr" target="_blank" href="http://jonmash.ca">JM</a>

	<br /><br /><br />

	
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- SHRTNR -->
<ins class="adsbygoogle"
 style="display:inline-block;width:728px;height:90px"
 data-ad-client="ca-pub-9209348786221882"
 data-ad-slot="8380781663"></ins>
<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<br /><br /><br />	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
	$(function () {
		$('#shrtnr').submit(function (e) {
			if($('#button').attr('disabled') != 'disabled' )
			{
				$.post( "shrtn.php", { url:  $('#lngurl').val() }, function( data ) {
					$( "#lngurl" ).val( data );
					$('#button').hide();
					$( "#lngurl" ).select();

					$('#afterreturn').html('<div class="fb-share-button" data-href="'+ data +'" data-width="120" data-type="button"></div> &nbsp;&mdash;&nbsp; <a href="https://twitter.com/share" data-text="Check this out: " data-url="'+ data +'" class="twitter-share-button" data-lang="en" data-count="none">Tweet</a>');
					$('#afterreturn').show();
					FB.XFBML.parse();
					twttr.widgets.load();
				});
			}
			$('#button').attr('disabled','disabled');
			e.preventDefault();
		});
		$('#lngurl').click(function (e) {
			$('#lngurl').focus();
			if($('#lngurl').val() == 'http://') 
			{
				var tmpStr = $('#lngurl').val();
				$('#lngurl').val('');
				$('#lngurl').val(tmpStr);
			}
		});
		$('#lngurl').blur(function (e) {
			if($('#lngurl').val() == '') 
			{ 
				$('#lngurl').val('Shorten your URL');
			}
		});		
		$('#lngurl').focus(function (e) {
			if($('#lngurl').val() == 'Shorten your URL') 
			{
				$('#lngurl').val('http://'); 
				var tmpStr = $('#lngurl').val();
				$('#lngurl').val('');
				$('#lngurl').val(tmpStr);
			}
		});			
	});
	</script>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-15403368-16', 'shrtnr.net');
	ga('send', 'pageview');

</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=561012490656421";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>
</html>

