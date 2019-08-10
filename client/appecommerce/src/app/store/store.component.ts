import { Component, OnInit } from '@angular/core';
import { ProductRepositoryService } from '../model/product-repository.service';
import { Product } from '../model/product';
import { Cart } from '../model/cart';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.css']
})
export class StoreComponent implements OnInit {
  public selectedCategory = null;
  public productsPerPage=5;
  public selectedPage=1;
  constructor(private productRepoService: ProductRepositoryService, private cart:Cart) { }

  ngOnInit() {
    //console.log(this.productRepoService.getProducts());
  }
  get products(): Product[]{
    const pageIndex=(this.selectedPage-1)*this.productsPerPage
    return this.productRepoService.getProducts(this.selectedCategory).slice(pageIndex,pageIndex+this.productsPerPage);
  }
  get productsScale(): Product[]{
    const pageIndex=(this.selectedPage-1)*this.productsPerPage
    return this.productRepoService.getProductsScale(this.selectedCategory).slice(pageIndex,pageIndex+this.productsPerPage);
  }
  get productsVendor(): Product[]{
    const pageIndex=(this.selectedPage-1)*this.productsPerPage
    return this.productRepoService.getProductsVendor(this.selectedCategory).slice(pageIndex,pageIndex+this.productsPerPage);
  }
  get categories(): string[]{
    return this.productRepoService.getCategories();
  }
  get categoriesScale(): string[]{
    return this.productRepoService.getCategoriesScale();
  }
  get categoriesVendor(): string[]{
    return this.productRepoService.getCategoriesVendor();
  }
  changeCategory(newCaterogy?: string){
    this.selectedPage=1;
    this.selectedCategory=newCaterogy;  
  //? para decirle que es opcional
  }

  get pageNumbers(): number[]{
    return Array(Math.ceil(this.productRepoService.getProducts(this.selectedCategory).length/this.productsPerPage))
    .fill(0).map((x,i) => i+1);
  }
  get pageNumbersScale(): number[]{
    return Array(Math.ceil(this.productRepoService.getProductsScale(this.selectedCategory).length/this.productsPerPage))
    .fill(0).map((x,i) => i+1);
  }
  get pageNumbersVendor(): number[]{
    return Array(Math.ceil(this.productRepoService.getProductsVendor(this.selectedCategory).length/this.productsPerPage))
    .fill(0).map((x,i) => i+1);
  }

  changePage(newNumber: number){
    this.selectedPage = newNumber;
  }
  changePageSize(newSize: number){
    this.productsPerPage=newSize;
    this.changePage(1);
  }
 
  addLine(product: Product){
    this.cart.addLine(product);
    this.cart.recalculate();
  }

 
  
  
}
