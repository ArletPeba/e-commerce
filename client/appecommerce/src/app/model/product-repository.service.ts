import { Injectable } from '@angular/core';
import { ProductDatasourceService } from './product-datasource.service';
import { Product } from './product';

@Injectable({
  providedIn: 'root'
})
export class ProductRepositoryService {
  private products: Product[] = [];
  private productScale: Product[] = [];
  private productVendor: Product[] = [];

  private categories:string[]=[];
  private categoriesScale:string[]=[];
  private categoriesVendor:string[]=[];
  private code: string[] = [];
  constructor(private dataSourceService: ProductDatasourceService) {
    dataSourceService.getProducts().subscribe((response) => {
      this.products= response['products'];
      this.categories = response['products'].map(p => p.productLine)
      .filter((c,index,array)=>array.indexOf(c)===index).sort();
      console.log(this.categories);
      this.code = response['products'].map(p => p.productCode).filter((c, index, array) => array.indexOf(c) == index).sort();
     // console.log(this.products)
    });

    dataSourceService.getProductsScale().subscribe((response) => {
      this.productScale= response['products'];
      this.categoriesScale = response['products'].map(ps => ps.productScale)
      .filter((c,index,array)=>array.indexOf(c)===index).sort();
      console.log(this.categoriesScale);
     
     // console.log(this.products)
    });
    dataSourceService.getProductsVendor().subscribe((response) => {
      this.productVendor= response['products'];
      this.categoriesVendor = response['products'].map(pv => pv.productVendor)
      .filter((c,index,array)=>array.indexOf(c)===index).sort();
      console.log(this.categoriesVendor);
     
     // console.log(this.products)
    });
  }

   getProducts(productLine: string = null): Product[]{
     return this.products.filter((p)=>productLine == null || p.productLine==productLine);
   }

   getProductsScale(productScale: string = null): Product[]{
     return this.productScale.filter((p)=>productScale == null || p.productScale==productScale);
    }
    getProductsVendor(productVendor: string = null): Product[]{
      return this.productVendor.filter((p)=>productVendor == null || p.productVendor==productVendor);
     }

   getCategories():string[]{
     return this.categories;
   }
   getCategoriesScale():string[]{
    return this.categoriesScale;
  }
  getCategoriesVendor():string[]{
    return this.categoriesVendor;
  }
   getProductsById(productCode: string){
   return this.products.filter((p) =>(p.productCode == productCode));
   }

  }
