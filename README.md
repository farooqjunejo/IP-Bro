<div align="center">

<img src="https://capsule-render.vercel.app/api?type=waving&color=0:0ea5e9,50:6366f1,100:8b5cf6&height=230&section=header&text=IP-Bro&fontSize=70&fontColor=ffffff&animation=fadeIn&fontAlignY=38&desc=Self-hosted%20IP%20%7C%20Domain%20%7C%20DNS%20%7C%20RDAP%20%7C%20SSL%20Lookup%20Tool&descAlignY=58&descSize=18" />

<br>

<img src="https://readme-typing-svg.demolab.com?font=Fira+Code&weight=600&size=24&duration=2500&pause=800&color=38BDF8&center=true&vCenter=true&width=900&lines=All-in-one+self-hosted+server+lookup+dashboard;DNS+%E2%80%A2+RDAP+%E2%80%A2+SSL+%E2%80%A2+Headers+%E2%80%A2+Blacklist+%E2%80%A2+Ports;Built+with+Laravel%2C+Docker%2C+Nginx+and+SQLite" alt="Typing SVG" />

<br><br>

<img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
<img src="https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white" />
<img src="https://img.shields.io/badge/Docker-Ready-2496ED?style=for-the-badge&logo=docker&logoColor=white" />
<img src="https://img.shields.io/badge/Nginx-Webserver-009639?style=for-the-badge&logo=nginx&logoColor=white" />
<img src="https://img.shields.io/badge/SQLite-Database-003B57?style=for-the-badge&logo=sqlite&logoColor=white" />

<br><br>

<img src="https://img.shields.io/github/stars/farooqjunejo/IP-Bro?style=social" />
<img src="https://img.shields.io/github/forks/farooqjunejo/IP-Bro?style=social" />
<img src="https://img.shields.io/badge/License-MIT-green?style=social" />

</div>

---

## ⚡ What is IP-Bro?

**IP-Bro** is a modern, self-hosted lookup dashboard for system administrators, hosting teams, email admins, developers and network troubleshooters.

It helps you inspect IP addresses, domains, hostnames and URLs from one clean Docker-based web interface.

> Run it on any VPS with one command.

```bash
docker compose up -d --build
```

Then open:

```text
http://localhost:8088
```

---

## 🎯 Main Highlights

<div align="center">

| Module           | What it checks                      |
| ---------------- | ----------------------------------- |
| 🔎 Smart Input   | IP, IPv6, domain, hostname, URL     |
| 🌐 DNS Lookup    | A, AAAA, MX, NS, TXT, CNAME, SOA    |
| 🔁 Reverse DNS   | PTR hostname lookup                 |
| 🛰️ RDAP / WHOIS | IP and domain registration data     |
| 🧾 HTTP Headers  | Status, redirects, security headers |
| 🔐 SSL Check     | Issuer, expiry, SANs, validity      |
| 🚫 DNSBL Check   | Spamhaus, Spamcop, SORBS, Barracuda |
| 🔌 Port Check    | Common authorized service ports     |
| 🕘 History       | SQLite lookup history               |
| 📤 Export        | Copy, JSON download, print view     |

</div>

---

## 🖼️ Dashboard Preview

<div align="center">

```text
┌───────────────────────────────────────────────────────────────┐
│                         IP-Bro Lookup                         │
├───────────────────────────────────────────────────────────────┤
│  Search: google.com                                           │
│                                                               │
│  Overview | DNS | RDAP | Headers | SSL | Blacklist | Ports    │
│                                                               │
│  ✅ DNS Records Found                                         │
│  ✅ HTTPS Active                                              │
│  ✅ SSL Valid                                                 │
│  ✅ RDAP Available                                            │
│  ✅ Blacklist Clean                                           │
└───────────────────────────────────────────────────────────────┘
```

</div>

---

## 🚀 Quick Start

### 1. Clone the repository

```bash
git clone https://github.com/farooqjunejo/IP-Bro.git
cd IP-Bro
```

### 2. Start IP-Bro

```bash
docker compose up -d --build
```

### 3. Open the app

```text
http://localhost:8088
```

---

## 🧪 Example Lookups

Try these after starting the container:

```text
google.com
8.8.8.8
cloudflare.com
1.1.1.1
https://github.com
mail.google.com
```

---

## 🧰 Tech Stack

<div align="center">

<img src="https://skillicons.dev/icons?i=laravel,php,docker,nginx,sqlite,bootstrap,linux,github" />

</div>

IP-Bro is built with:

* Laravel 11
* PHP 8.3
* Nginx
* PHP-FPM
* SQLite
* Docker
* Docker Compose
* Blade Templates
* Bootstrap 5

---

## 🔍 Lookup Features

### 🔎 Smart Input Normalization

IP-Bro accepts:

* IPv4 address
* IPv6 address
* Domain name
* Hostname
* Full URL

It automatically:

* Removes `http://` and `https://`
* Extracts hostname from URLs
* Detects input type
* Validates safely
* Shows clean errors for invalid input

---

### 🌐 DNS Lookup

For domains and hostnames, IP-Bro checks:

* A records
* AAAA records
* MX records
* NS records
* TXT records
* CNAME records
* SOA records

---

### 🔁 Reverse DNS Lookup

For IP addresses, IP-Bro checks:

* PTR hostname
* Reverse DNS result

---

### 🛰️ RDAP / WHOIS Lookup

For IP addresses, IP-Bro shows:

* IP range
* Network name
* Registry
* Country
* Organization
* RDAP handle
* Raw RDAP link

For domains, IP-Bro shows:

* Registrar
* Registration date
* Expiry date
* Nameservers
* Domain status
* RDAP handle
* Raw RDAP link

---

### 🧾 HTTP Header Check

IP-Bro checks both HTTP and HTTPS:

* HTTP status code
* HTTPS status code
* Final redirected URL
* Redirect chain
* Server header
* X-Powered-By
* Content-Type
* Strict-Transport-Security
* X-Frame-Options
* X-Content-Type-Options
* Content-Security-Policy

---

### 🔐 SSL Certificate Check

For HTTPS domains, IP-Bro shows:

* SSL valid or invalid
* Issuer
* Subject
* Valid from
* Valid until
* Days remaining
* SAN domains
* Signature algorithm

---

### 🚫 DNSBL Blacklist Check

IP-Bro checks IPv4 addresses against:

* zen.spamhaus.org
* bl.spamcop.net
* dnsbl.sorbs.net
* b.barracudacentral.org
* psbl.surriel.com

No website scraping is used.

---

### 🔌 Authorized Port Check

IP-Bro checks only common service ports:

```text
21    FTP
22    SSH
25    SMTP
53    DNS
80    HTTP
110   POP3
143   IMAP
443   HTTPS
465   SMTPS
587   SMTP Submission
993   IMAPS
995   POP3S
3306  MySQL
3389  RDP
8080  HTTP Alt
8443  HTTPS Alt
```

> ⚠️ Only check servers you own or have permission to test.

---

## 📦 Docker Commands

### Start

```bash
docker compose up -d --build
```

### Stop

```bash
docker compose down
```

### Restart

```bash
docker compose restart
```

### View logs

```bash
docker compose logs -f
```

### View app logs

```bash
docker compose logs -f app
```

### View Nginx logs

```bash
docker compose logs -f webserver
```

### Rebuild

```bash
docker compose up -d --build
```

---

## 🔄 Update IP-Bro

```bash
git pull
docker compose up -d --build
```

---

## 🧹 Reset Database

```bash
docker compose exec app php artisan migrate:fresh --force
```

---

## 📁 Project Structure

```text
IP-Bro/
├── Dockerfile
├── docker-compose.yml
├── docker/
│   └── nginx/
│       └── default.conf
├── src/
│   ├── app/
│   │   ├── Http/Controllers/
│   │   ├── Models/
│   │   └── Services/
│   ├── database/migrations/
│   ├── resources/views/
│   └── routes/web.php
├── README.md
└── .gitignore
```

---

## 🔒 Security

IP-Bro is designed for safe self-hosted diagnostics.

It does **not** use:

* `exec`
* `shell_exec`
* `system`
* `passthru`
* `nmap`
* aggressive scanning
* background scanning
* paid APIs

All external checks use timeouts.

The port checker only checks a fixed list of common ports.

For public deployment, add:

* HTTPS
* Authentication
* Firewall rules
* Reverse proxy protection
* Rate limiting
* Regular updates

---

## 👨‍💻 Use Cases

IP-Bro is useful for:

* System administrators
* Hosting providers
* Email administrators
* Web developers
* Security learners
* DNS troubleshooting
* SSL monitoring
* Server checks
* IP reputation checks

---

## 🧭 Roadmap Ideas

* Authentication
* Dark/light theme toggle
* Screenshot export
* Scheduled SSL expiry checks
* Domain expiry alerts
* More DNS record types
* API endpoint
* CSV export
* Multi-target bulk lookup

---

## 🤝 Contributing

Contributions are welcome.

You can improve:

* UI design
* Lookup modules
* Error handling
* Export options
* Documentation
* Security hardening

---

## 📄 License

Open-source and free to use for personal or commercial self-hosted deployments.

---

<div align="center">

<img src="https://capsule-render.vercel.app/api?type=waving&color=0:8b5cf6,50:6366f1,100:0ea5e9&height=140&section=footer" />

### Built for sysadmins, hosting teams and network troubleshooting.

**Made with Laravel, Docker and PHP.**

</div>
