Laravel Server-Side Programming Assignment Marking Checklist

1. Built Using Laravel 11+ (10 marks)
   - Laravel version 11 or newer
   - Routes defined in routes/web.php and routes/api.php
   - Controllers used (avoid excessive route closures)
   - Middleware applied on routes (auth, throttling, CORS, etc.)
   - Models extend Eloquent ORM
   - Database migrations exist with schema, indexes, foreign keys
   - Views use Blade templates, layouts, and sections
   - Use of advanced features (queues, caching, event listeners)
   - Use policies/gates for authorization
   - Use Form Request classes for validation
   - Clean, well-structured, PSR-compliant code

2. SQL Database Connection (10 marks)
   - Secure SQL connection (MySQL or SQLite with DB file)
   - Migrations applied and DB schema complete
   - CRUD operations implemented securely
   - Use prepared statements/parameter binding (via Eloquent)
   - Use transactions where necessary
   - Optimized queries (indexes, stored procedures optional)
   - Error handling for DB operations

3. Business Scenario Features (40 marks)
   - Use Livewire or Volt for interactive UI components
   - Implement Laravel Eloquent ORM effectively (relationships, query scopes, accessors, mutators)
   - Use Laravel Jetstream for authentication
     (registration, login, password reset, optional 2FA/OAuth integration)
   - Use Laravel Sanctum for API authentication
     (token generation, scopes, expiration, revocation, multi-device support)
   - Follow Laravel best practices

4. Security Documentation & Implementation (10 marks)
   - Document common web threats (CSRF, XSS, SQLi, session hijacking)
   - Describe Laravel mitigations (CSRF tokens, hashed passwords, auth middleware)
   - Show implemented countermeasures in code (screenshots, logs)
   - Use input validation and sanitization
   - Enforce HTTPS and secure session handling
   - Use Role-Based Access Control or policies/gates
   - Advanced features (rate limiting, email verification, unauthorized access logging)

5. Use of MongoDB for API (Optional, 10 marks)
   - MongoDB integrated for part of API
   - CRUD operations implemented securely
   - Use advanced MongoDB features (indexing, aggregation)
   - Proper error handling and validation
   - Include screenshots of MongoDB collections

6. Hosting Service Provider (Optional, 20 marks)
   - App deployed on public hosting (Heroku, AWS, Render, Railway, etc.)
   - Use HTTPS (SSL/TLS)
   - Use load balancing or autoscaling if possible
   - Enable backups and monitoring
   - Implement CI/CD pipelines
   - Use containerization (Docker/Kubernetes) if possible
   - Use CDN for static assets
   - Ensure uptime, fault tolerance, and security features (firewalls, MFA)

7. Submission & Demonstration
   - Submit ZIP (not RAR) on LMS immediately after demo
   - ZIP includes full code, SQL dump or SQLite DB file, MongoDB screenshots (if used), security doc
   - Be ready for 10-minute demo
     Explain your Laravel usage, security, API auth, and business features clearly
