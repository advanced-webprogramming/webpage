const express = require('express');
const router = express.Router();
const models = require("../models");
const crypto =require('crypto');


router.get('/sign_up', function(req, res, next) {
  res.render("user/signup");
});


router.post("/sign_up", function(req,res,next){
  let body = req.body;

  let inputPassword = body.pswd1;
  let salt = Math.round((new Date().valueOf() * Math.random())) + "";
  let hashPassword = crypto.createHash("sha512").update(inputPassword + salt).digest("hex");

  let result = models.user.create({
      userId:body.userId,
      password: hashPassword,
      name: body.name,
      email: body.email,
      phonenumber:body.mobile,
      salt: salt
  })

  res.redirect("/user/sign_up");
})

module.exports = router;