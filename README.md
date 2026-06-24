# IP-Bro
An all-in-one, self-hosted Docker lookup tool for IP addresses, domains, and web servers. Built with Laravel 11 and Docker.

## Features
- Smart Input Validation (IP, IPv6, URL, Domain)
- DNS & Reverse DNS Lookups
- RDAP Integration
- HTTP Header & Redirect Checks
- SSL Certificate Validation
- DNSBL Blacklist Checker (Spamhaus, Spamcop, etc.)
- Basic Authorized Port Checker
- SQLite History Logging

## Requirements
- Docker
- Docker Compose

## Installation & Running

1. Clone or copy the folder structure to your VPS.
2. Build and start the container:
   ```bash
   docker compose up -d --build