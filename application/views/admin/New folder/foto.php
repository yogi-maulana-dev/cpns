<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
	div > div {
 background-image: url(http://simpustaka.pakpakbharatkab.go.id/assets/img/card.jpg);
 background-repeat: no-repeat;
 background-position: center center;
 background-color: #ccc;
 border: 0px solid;
 width: 9cm;
 height: 5cm;
}
div.contain {
 background-size: contain;
}
div.cover {
 background-size: cover;
}
</style>
<body>
<div>
 <div class="contain"></div>
 <p>Note the grey background. The image does not cover the whole region, but it's fully
<em>contained</em>.
 </p>
</div>
<div>
 <div class="cover"></div>
 <p>Note the ducks/geese at the bottom of the image. Most of the water is cut, as well as a part
of the sky. You don't see the complete image anymore, but neither do you see any background color;
the image <em>covers</em> all of the <code>&lt;div&gt;</code>.</p>
</div>
</body>
</html>