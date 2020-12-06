'use strict';
module.exports = {
  up: (queryInterface, Sequelize) => {
    return queryInterface.createTable('users', {
      userId: {
        type: Sequelize.STRING,
        allowNull: false,
        primaryKey: true
      },
      password: {
        type: Sequelize.STRING,
        allowNull: false
      },
      name:{
        type: Sequelize.STRING,
        allowNull: false
      },
      email: {
        type: Sequelize.STRING,
        allowNull: false,
        validate: {
          isEmail: true
        }
      },
      phonenumber:{
        type: Sequelize.STRING,
        allowNull: false
      },
      salt:{
        type: Sequelize.STRING
      },
      createdAt: {
        allowNull: false,
        type: Sequelize.DATE
      },
      updatedAt: {
        allowNull: false,
        type: Sequelize.DATE
      }
    });
  },
  down: (queryInterface, Sequelize) => {
    return queryInterface.dropTable('users');
  }
};