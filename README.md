# Panelis Branch

Manage branches within multi-tenant Panelis applications.

## Features

* Branch management
* Branch code and contact information
* Address management
* Tenant-aware branch organization
* Automatic Panelis plugin discovery

## Requirements

* PHP 8.3+
* Laravel 13+
* Filament 5+

## Installation

Install the package via Composer:

```bash
composer require panelis-php/branch
```

Run migrations:

```bash
php artisan migrate
```

## Usage

The Branch module is designed for applications that use Filament multi-tenancy.

When multi-tenancy is enabled, a **Branches** menu will be available in the admin panel, allowing tenants to manage their branches and related information.

Example use cases:

* Companies with multiple offices
* Retail stores
* Clinics and healthcare providers
* Hotels and hospitality businesses
* Franchise networks

Each branch can store information such as:

* Name
* Code
* Email address
* Phone number
* Address

## Multi-Tenancy

This module is only active when Filament multi-tenancy is enabled.

In single-tenant applications, the Branch module remains inactive and does not register navigation items or resources.

## License

The MIT License (MIT).
