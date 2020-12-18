function check_input() {
  if (!document.loginSbmt.id.value) {
    alert("아이디를 입력하세요");
    document.loginSbmt.id.focus();
    return;
  }

  if (!document.loginSbmt.pw.value) {
    alert("비밀번호를 입력하세요");
    document.loginSbmt.pw.focus();
    return;
  }
  document.loginSbmt.submit();
}