---
id: 67rym
name: API URL Base
file_version: 1.0.2
app_version: 0.7.0-1
file_blobs:
  src/Api.php: 9ee129bb12085c2f9df3cab94ef799cb365d991e
---

Base API for The Movie Database using version 3
<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Api.php
```hack
⬜ 14         public Response $latestResponse;
⬜ 15     
⬜ 16         // Utilizing version 3 of the API
🟩 17         protected string $baseUrl = 'https://api.themoviedb.org/3/';
⬜ 18     
⬜ 19         public function __construct(
⬜ 20             protected string $token
```

<br/>

This file was generated by Swimm. [Click here to view it in the app](https://app.swimm.io/repos/Z2l0aHViJTNBJTNBbGFyYXZlbC10bWRiJTNBJTNBdGNhbXBiUFBV/docs/67rym).