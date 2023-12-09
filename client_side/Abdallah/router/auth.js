const express =require('express');
const authController = require('../controllers/auth');
const app = express();


const router = express.Router();

router.post('/signup', authController.signup)

module.exports = router;