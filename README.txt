# Khayal Website — Shared Hosting Package

## Upload Instructions
1. Upload the entire contents of this folder to your public_html (or www) directory via File Manager or FTP.
2. Make sure your hosting supports PHP (any version 7.4+). Most shared hosts do by default.
3. Add your images to the /images/ folder as listed below.
4. Visit your domain — done!

---

## File Structure

```
/
├── index.php          ← Home page
├── menu.php           ← Food menu + review form
├── drinks.php         ← Drinks menu
├── gallery.php        ← Photo gallery
├── contact.php        ← Contact + working email form
├── style.css          ← All styles (do not rename)
├── includes/
│   ├── nav.php        ← Shared navigation
│   └── footer.php     ← Shared footer
└── images/
    ├── khayal-logo.png                        ← Logo (used everywhere)
    ├── hero-image.jpg                         ← Hero background (index)
    ├── fragrant-rice-with-chicken-mandi.jpg   ← Chicken Mandi
    ├── beef-laham-hanidh-meat-dish.jpg        ← Beef Hanidh
    ├── full-goat-mandi-with-rice.jpg          ← Full Goat Mandi
    ├── grilled-fresh-fish-rustica-style.jpg   ← Rustica Fish
    ├── deluxe-burger-halal.jpg                ← Khayal Deluxe Burger
    ├── spicy-chicken-burger.jpg               ← Spicy Chicken Burger
    ├── mixed-grill-sandwich.jpg               ← Mixed Grill Sandwich
    ├── lamb-sandwich-halal.jpg                ← Spiced Lamb Sandwich
    ├── hummus-salad.jpg                       ← Hummus & Greens Salad
    ├── rice-pilaf.jpg                         ← Fragrant Rice Pilaf
    ├── lentil-soup.jpg                        ← Traditional Lentil Soup
    ├── tomato-soup-spiced.jpg                 ← Spiced Tomato Soup
    └── interior/
        └── dsc-1751.jpg                       ← Restaurant interior (hero + story + gallery)
```

---

## Contact Form
The contact form on contact.php sends emails to info@khayal-lounge.co.ke using PHP's mail().
Most shared hosts have mail() enabled. If emails don't arrive:
- Check your hosting control panel for a mail log
- Some hosts require SMTP — ask your host or use a plugin like PHPMailer with SMTP credentials

## Review Form
The review form on menu.php also sends submissions to info@khayal-lounge.co.ke.
