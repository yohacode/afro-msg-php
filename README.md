# AfroMsg - PHP SDK for Afromessage API

[![Latest Version](https://img.shields.io/packagist/v/yohacodes/afro-msg-php.svg?style=flat-square)](https://packagist.org/packages/yohacode/afromsg)
[![Build Status](https://github.com/yohaqr/yohaqr/actions/workflows/php.yml/badge.svg)](https://github.com/yohacode/afromsg/actions/workflows/php.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/yohacode/afromsg.svg)](https://packagist.org/packages/yohacode/afromsg)
[![Monthly Downloads](https://img.shields.io/packagist/dm/yohacode/afromsg.svg)](https://packagist.org/packages/yohacode/afromsg)
[![License](https://img.shields.io/packagist/l/yohacode/afromsg.svg)](https://packagist.org/packages/yohacode/afromsg)



**AfroMsg** is a modern, extensible PHP SDK for integrating with the [Afromessage API](https://api.afromessage.com/). It supports token-based authentication, code verification, message sending, and is fully PSR-compliant. Ideal for Laravel and any PHP-based backend.

---

## 🚀 Features

- ✅ Clean and simple API for SMS verification and messaging
- ✅ PSR-4 & PSR-12 compliant structure
- ✅ Laravel-ready (via optional ServiceProvider)
- ✅ Extensible via interfaces (use Guzzle, Curl, or any HTTP client)
- ✅ Fully tested with PHPUnit
- ✅ IDE-friendly with stubs and PHPDocs

---

## 📦 Installation

Install the SDK using Composer:

```bash
composer require yohacodes/afro-msg-php
````

---

## ⚙️ Configuration

Create a `.env` file or define your token manually:

```env
AFROMESSAGE_API_TOKEN=your_api_token
```

Alternatively, configure directly in code:

```php
$client = new \AfroMsg\Http\GuzzleAfromessageClient('your_api_token');
```

---

## ✨ Quick Start

### 🔍 Verify Code

```php
use AfroMsg\Http\GuzzleAfromessageClient;

$client = new GuzzleAfromessageClient('your_api_token');

$response = $client->verifyCode('+251912345678', '123456');

if ($response['success']) {
    echo "Code verified!";
} else {
    echo "Verification failed.";
}
```

---

## 🧱 Architecture

```plaintext
AfroMsg\
├── Contracts\            # Interfaces for HTTP clients
├── Http\                 # Guzzle implementation (default)
├── Responses\            # Response wrappers
├── Exceptions\           # Custom exception classes
├── Support\              # Helper utilities
├── AfroMsg.php           # Facade for simplified usage
└── stubs\                # IDE stubs and config templates
```

---

## 🧪 Testing

Run all unit and feature tests using:

```bash
vendor/bin/phpunit
```

We recommend using `Mockery` and `Guzzle MockHandler` for mocking API calls.

---

## 🧩 Extending

Create a custom client by implementing the interface:

```php
namespace AfroMsg\Contracts;

interface AfromessageClientInterface
{
    public function verifyCode(string $to, string $code): array;
}
```

You can then inject or bind your implementation as needed.

---

## 🎯 Laravel Integration (Optional)

For Laravel users, a service provider and config file can be published:

```bash
php artisan vendor:publish --provider="AfroMsg\AfromessageServiceProvider"
```

```php
use AfroMsg\Facades\AfroMsg;

AfroMsg::verifyCode('0912345678', '4567');
```

---

## 🧠 Roadmap

* [x] Basic verify functionality
* [ ] SMS sending
* [ ] Delivery reports
* [ ] Balance check
* [ ] Notifications and webhooks
* [ ] Laravel package auto-discovery

---

## 🤝 Contributing

Contributions are welcome!

1. Fork the repo
2. Run `composer install`
3. Create your feature branch (`git checkout -b feature/my-feature`)
4. Commit your changes
5. Push to the branch
6. Create a new Pull Request

---

## 🛡 License

This package is open-sourced software licensed under the [MIT license](LICENSE).

---

## 📞 Contact & Support

For questions or support, please open an [issue](https://github.com/yohacode/afromsg/issues) or email `support@yourdomain.com`.

---

> Crafted with ❤️ by Yohannes Z. (https://github.com/yohacode)

```

---

### ✅ Next Steps

If you'd like, I can:
- Generate this as a full GitHub-ready package
- Scaffold the full project structure as a `.zip`
- Add CI workflow (`.github/workflows/tests.yml`)
- Create Packagist metadata

Would you like the full structure generated?
```
