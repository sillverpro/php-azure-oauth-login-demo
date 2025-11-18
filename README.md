# Microsoft 365 Login (PHP Example)

This repository contains a simple, clean example of how to authenticate users using **Microsoft 365 / Entra ID (Azure AD)** with **plain PHP**, no frameworks required.

It includes:
- `config.php` — configuration & environment setup  
- `login.php` — redirect user to Microsoft login  
- `callback.php` — handle the authorization code and request tokens  

---

## 🚀 Features
- Secure OAuth2 Authorization Code Flow  
- Works with Microsoft 365 / Entra ID  
- Fully commented for beginners  
- Localhost & production-ready  

---

## 📌 Requirements
- PHP 7.4+  
- cURL enabled  
- A Microsoft Azure App Registration  
- Localhost or domain for redirect URIs  

---

# 🛠 Step-by-Step Guide (Microsoft 365 Login Setup)

## 1️⃣ Register an Application in Azure Portal

1. Visit: https://portal.azure.com  
2. Search for **App registrations**  
3. Click **New registration**  
4. Fill in:
   - Name: `YourAppName`
   - Supported account types: Choose based on your use case
   - Redirect URI:
     - `http://localhost/your-project/callback.php`
     - `https://yourdomain.com/callback.php`
5. Click **Register**

---

## 2️⃣ Retrieve Your Credentials

From the app overview page:

- **Tenant ID**
- **Client ID**

Then:

**Certificates & Secrets → New Client Secret**  
→ Copy the **secret value** (cannot be seen again)

---

## 3️⃣ Configure Your Project (config.php)

Update your config:

```php
$tenantId     = "YOUR_TENANT_ID";
$clientId     = "YOUR_CLIENT_ID";
$clientSecret = "YOUR_CLIENT_SECRET";
$redirectUri  = "https://yourdomain.com/callback.php";
```

---

## 4️⃣ Start Login

Open in browser:

```
/login.php
```

This redirects the user to Microsoft’s secure login portal.

---

## 5️⃣ Callback Handling

After login, Microsoft redirects to:

```
/callback.php?code=xxxx
```

This file exchanges the authorization code for tokens using Microsoft's token endpoint.

---

# 📦 Included Files

```
├── src
│   ├──config.php
│   ├──login.php
│   ├──callback.php
├── README.md
├── LICENSE
```

---

# 🔐 Security Best Practices

- Never commit real secrets into GitHub  
- Use `.env` or server variables in production  
- Only use HTTPS for redirect URLs  
- Rotate client secrets regularly  

---

# 📄 License
MIT License — free to use in personal and commercial projects.