# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/legal-mentions` | `GET`| `MainController` | `legalMentions` | Mentions légales | This page contains all boring legal stuff | - |
| `/catalog/category/[i:categoryId]` | `GET` | `CatalogController` | `category` | Nom de la catégory | Page displaying category informations & maybe products | the id is dynamics with [i:catgoryId] and it will be used to get the right category from database |
| `/catalog/type/[i:typeId]` | `GET` | `CatalogController ` | `type` | Nom du type | Will display Type page [typeId]  | [typeId] in the URL represents type id stored in database |
| `/catalog/brand/[i:brandId]` | `GET` | `CatalogController ` | `brand` | Nom de la marque | Will display Brand page [brandId]  | [brandId] in the URL represents brand id from database |
| `/catalog/product/[i:productId]` | `GET` | `CatalogController ` | `product` | product [productId] | Will display Product page [productId]  | [] in the URL represents product id from database |