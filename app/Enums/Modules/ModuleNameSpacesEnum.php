<?php

namespace App\Enums\Modules;

enum ModuleNameSpacesEnum: string
{
    const string ACTIONS = 'Actions';
    const string CONTRACTS = 'Contracts';
    const string CONFIG = 'Config';
    const string CONSOLE = 'Console';
    const string ENUMS = 'Enums';
    const string EXCEPTIONS = 'Exceptions';
    const string CONTROLLERS = 'Http\\Controllers';
    const string MIDDLEWARES = 'Http\\Middleware';
    const string REQUESTS = 'Http\\Requests';
    const string RESOURCES = 'Http\\Resources';
    const string TRAITS = 'Http\\Traits';
    const string MODELS = 'Models';
    const string OBSERVERS = 'Observers';
    const string POLICIES = 'Policies';
    const string PROVIDERS = 'Providers';
    const string LANG = 'Lang';
    const string JOBS = 'Jobs';
    const string EVENTS = 'Notifies\\Events';
    const string LISTENERS = 'Notifies\\Listeners';
    const string NOTIFICATIONS = 'Notifies\\Notifications';
    const string FACTORIES = 'Database\\factories';
    const string MIGRATIONS = 'Database\\migrations';
    const string SEEDERS = 'Database\\seeders';
    const string HELPERS = 'Helpers';
    const string ROUTES = 'Routes';
    const string RULES = 'Rules';
    const string SERVICES = 'Services';
}
