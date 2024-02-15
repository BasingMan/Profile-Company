# Profile Company



## Setelah clone

buka terminal
run code di bawah ini 
```
composer install
composer update
php artisan run
```

## Teknis pengerjaan
untuk list task ada di spreadsheet ini
[Spreadsheet task](https://docs.google.com/spreadsheets/d/10ypGVEd6DIyOfn7PVv3jdh1vLMbvI9j6yXUqtFHF63I/edit?usp=sharing)

untuk teknis pengerjaan 
- gunakan branch masing - masing 
    - buat branch 
    ``` 
    git branch [nama branch] 
    git checkout origin [nama branch]
    ```
- untuk **attar** kalau mau tambahin route pake route yang frontend.php
- untuk **fadhlan** kalau mau tambahin route pake route yang backend.php
- waktu mau ngerjain salah satu task pastikan ganti progressnya jadi on progress, kalau gk selesai ngejainnya update persentase progressnya di spreadsheet
- kalau ada fitur yang udh beres nanti aku periksa dan kalau ada revisi bisa di cek di spreadsheet 
- kalau udh selesai ngerjain tasknya lgsg push aja
    - git push 
    ```
    git pull origin dev
    git add .
    git commit -m "[jelaskan isi task]"
    git push origin [nama branch kamu]
    ```
    - udh itu merge request ke branch dev
        - buka gitlab
        - trs ke menu merge request 
        - tambah merge request dr branch kamu ke branch dev **jangan sampe ke branch main harus ke branch dev**
        - merge request **jangan langsung di merge**
        - kalau gagal liat dulu apa ada conflict kalau ada benerin dl conflictnya
