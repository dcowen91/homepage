<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap In Action - Landing Page Example</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600' rel='stylesheet'>
  <style>
  body {
    padding-top: 20px;
    font-size: 16px;
    font-family: "Open Sans",serif;
  }
  h1 {
    font-family: "Abel", Arial, sans-serif;
    font-weight: 400;
    font-size: 40px;
  }

  .margin-base-vertical {
    margin: 40px 0;
  }

  </style>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-offset-3">

        <h1 class="margin-base-vertical">Have you ever seen the rain?</h1>

        <p>
          Someone told me long ago there's a calm before the storm. I know, It's been comin for some time.
        </p>
        <p>
          When it's over, so they say, it'll rain a sunny day. I know, Shinin down like water.
        </p>

        <p>
          I want to know, have you ever seen the rain?
        </p>

        <form class="margin-base-vertical">
          <p class="input-group">
            <span class="input-group-addon"><span class="icon-envelope"></span></span>
            <input type="text" class="form-control input-large" name="email" placeholder="jonsnow@knowsnothi.ng" />
          </p>
          <p class="help-block text-center"><small>We won't send you spam. Unsubscribe at any time.</small></p>
          <p class="text-center">
            <button type="submit" class="btn btn-success btn-large">Keep me posted</button>
          </p>
        </span>
      </form>

    </div>
  </div>
</div>

</body>
</html>