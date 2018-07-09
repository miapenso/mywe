<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/9
 * Time: 10:00
 */
const MYWE_AUTHKEY                                  = '639d3208';
const USER_FOUNDER                                  = '1';
const ACCOUNT_MANAGE_GROUP_VICE_FOUNDER             = '2';
const USER_STATUS_CHECK                             = '1';
const USER_STATUS_BAN                               = '3';
const REGULAR_MOBILE                                = '/^1\d{10}$/';


/**
 * 用户
 */
const USER_LOGIN_FAIL = 10010000;
const USER_LOGIN_SUCCESS = 10010001;
const USER_USERNAME_NO_EXIST = 10010002;
const USER_USERNAME_EXIST = 10010003;
const USER_MOBILE_EXIST = 10010004;
const USER_MOBILE_NO_EXIST = 10010005;
const USER_PASSWORD_ERROR_FIVE_TIMES = 10010006;
const USER_PASSWORD_ERROR = 10010007;
const USER_IS_OVERTIME = 10010008;
const USER_IS_CHECK = 10010009;
const USER_IS_BAN = 10010010;
const USER_LOGIN_VERIFY_ERROR = 10010011;