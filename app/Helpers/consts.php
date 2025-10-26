<?php


const API_VERSION_PREFIX = 'v1';
const API_VERSION_NAME = 'v1.';
const BACKEND_PREFIX = 'backend';
const BACKEND_NAME = 'backend.';
const FRONTEND_PREFIX = 'frontend';
const FRONTEND_NAME = 'frontend.';
const ADMIN_PREFIX = 'admin';
const ADMIN_NAME = 'admin';
const USER_PREFIX = 'user.';
const USER_NAME = 'user.';

const DEFAULT_AUTH_MIDDLEWARES = ['auth:sanctum', 'auth.userStatus'];
const DEFAULT_ADMIN_MANAGER_MIDDLEWARES = ['auth.adminOrManager'];
const DEFAULT_USER_MIDDLEWARES = ['auth.user'];

const PAGINATE_PER_PAGE = 20;
