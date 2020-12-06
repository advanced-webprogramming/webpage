'use strict';
module.exports = (sequelize, DataTypes) => {
  var user = sequelize.define('user', {
    userId:{
      type: DataTypes.STRING,
      allowNull: false,
      primaryKey: true
    },
    password: {
      type: DataTypes.STRING,
      allowNull: false
    },
    email: {
      type: DataTypes.STRING,
      allowNull: false,
      validate: {
        isEmail: true
      }
    },
    name: {
      type: DataTypes.STRING,
      allowNull: false
    },
    phonenumber: {
      type: DataTypes.STRING,
      allowNull: false
    },
    salt:{
      type: DataTypes.STRING
    }
  });

  return user;
};