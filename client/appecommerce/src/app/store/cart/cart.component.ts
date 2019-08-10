import { Component, OnInit } from '@angular/core';
import { Cart, CartLine } from 'src/app/model/cart';
import { Product } from 'src/app/model/product';
import { StoreComponent } from '../store.component';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {

  constructor(private cart: Cart) { }

  ngOnInit() {
  }

 get linesDetailAll(): CartLine[]{
  return this.cart.getLinesAll();
 }

 deleteLine(index: number){
   this.cart.deleteLine(index);
   this.cart.recalculate();
 }

 update(product: Product, quantity: number){
  return this.cart.updatecart(product,+quantity);
 } 
}
