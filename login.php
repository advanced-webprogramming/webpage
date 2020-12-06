<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>러임오렌지 회원 로그인</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Do+Hyeon&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="assets/css/login.css" />
    
  </head>
  <body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img
                src="assets/images/chat.jpg"
                alt="login"
                class="login-card-img"
              />
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <div class="brand-wrapper">
                  <img src="assets/images/logo.png" alt="logo" class="logo" />
                </div>
                <form
                  name="loginSbmt"
                  id="loginSbmt"
                  method="post"
                  action="login_ok.php"
                >
                  <div class="form-group">
                    <label for="id" class="sr-only">ID</label>
                    <input
                      type="id"
                      name="id"
                      id="id"
                      class="form-control"
                      placeholder="ID"
                    />
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input
                      type="password"
                      name="password"
                      id="password"
                      class="form-control"
                      placeholder="***********"
                    />
                  </div>
                  <input
                    name="login"
                    id="login"
                    class="btn btn-block login-btn mb-4"
                    type="button"
                    value="Login"
                    onclick="check_input()"
                  />
                </form>
                <a href="#!" class="forgot-password-link">비밀번호 찾기</a>
                <p class="login-card-footer-text">
                  아직 회원이 아니신가요?
                  <a href="#!" class="text-reset">회원가입 하러가기</a>
                </p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="./login.js"></script>
  </body>
</html>
