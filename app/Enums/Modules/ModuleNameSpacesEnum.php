<?php

namespace App\Enums\Modules;

enum ModuleNameSpacesEnum: string
{
    case ACTIONS = 'Actions';
    case CONTRACTS = 'Contracts';
    case CONFIG = 'Config';
    case CONSOLE = 'Console';
    case ENUMS = 'Enums';
    case EXCEPTIONS = 'Exceptions';
    case CONTROLLERS = 'Http\\Controllers';
    case MIDDLEWARES = 'Http\\Middleware';
    case REQUESTS = 'Http\\Requests';
    case RESOURCES = 'Http\\Resources';
    case TRAITS = 'Http\\Traits';
    case MODELS = 'Models';
    case OBSERVERS = 'Observers';
    case POLICIES = 'Policies';
    case PROVIDERS = 'Providers';
    case LANG = 'Lang';
    case JOBS = 'Jobs';
    case EVENTS = 'Notifies\\Events';
    case LISTENERS = 'Notifies\\Listeners';
    case NOTIFICATIONS = 'Notifies\\Notifications';
    case FACTORIES = 'Database\\factories';
    case MIGRATIONS = 'Database\\migrations';
    case SEEDERS = 'Database\\seeders';
    case HELPERS = 'Helpers';
    case ROUTES = 'Routes';
    case RULES = 'Rules';
    case SERVICES = 'Services';
}
