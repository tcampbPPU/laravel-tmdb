---
id: 3bvjy
name: Tmdb API constructor token
file_version: 1.0.2
app_version: 0.7.0-1
file_blobs:
  src/Tmdb.php: a7ab11e25be6a82374190731568f0ca9d7b30d3a
---

`$token` should get binded by the value found in `config('tmdb.token')`
<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Tmdb.php
```hack
⬜ 23         protected SearchEndpoint $search;
⬜ 24         protected TrendingEndpoint $trendingResults;
⬜ 25     
🟩 26         public function __construct(string $token)
🟩 27         {
🟩 28             $this->api = new Api($token);
🟩 29         }
⬜ 30     
⬜ 31         public function account(): AccountEndpoint
⬜ 32         {
```

<br/>

This file was generated by Swimm. [Click here to view it in the app](https://app.swimm.io/repos/Z2l0aHViJTNBJTNBbGFyYXZlbC10bWRiJTNBJTNBdGNhbXBiUFBV/docs/3bvjy).