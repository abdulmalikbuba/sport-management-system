<!DOCTYPE html>
<html lang="en">
<head>
  <% base_tag %>
  $MetaTags
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>$SiteConfig.Title &raquo; <% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %></title>
  <%-- <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet"> --%>
  <%-- <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css"> --%>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="$resourceURL('app/images/img/sports.png')" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="$resourceURL('app/images/img/logo.png')" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Sign into your account</p>
                $Form
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <%-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --%>
  <%-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> --%>
  <%-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --%>
</body>
</html>
