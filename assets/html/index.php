<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container {
        border-top: 7px solid #337ab7;
        padding-top: 30px;
      }

      .table th:first-child {
        width: 70px;
      }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row">

        <div class="col-sm-2">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#">Token</a></li>
            <li><a href="#">Country</a></li>
            <li><a href="#">Customers</a></li>
          </ul>
        </div>

        <div class="col-sm-10">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-primary">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Form
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  
                  <form>
                    <div class="form-group">
                      <label for="exampleInputFirstName">First Name</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="First Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputLastName">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputLastName" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputLastName">Country</label>
                      <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputLastName">Last Name</label>
                      <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

                </div>
              </div>
            </div>
          </div>
          
          <form class="form-horizontal">
            <div class="form-group">
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputSearch" placeholder="Search">
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>

          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Country</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>John
                  <a href="#">test link</a>
                  <form>
                    <div class="form-group">
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Text input">  
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
                </td>
                <td>USA</td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>