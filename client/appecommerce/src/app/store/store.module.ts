import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { StoreComponent } from './store.component';
import { NavComponent } from './nav/nav.component';
import { FooterComponent } from './footer/footer.component';
import { Cart } from '../model/cart';
import { CartSummaryComponent } from '../model/cart-summary/cart-summary.component';
import { CartComponent } from './cart/cart.component';
import { CheckoutComponent } from './checkout/checkout.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { ModelModule } from '../model/model.module';
import { RouterModule } from '@angular/router';
import { AppRoutingModule } from '../app-routing.module';
import { ProductDetailComponent } from './product-detail/product-detail.component';

@NgModule({
  declarations: [StoreComponent, NavComponent, FooterComponent, CartSummaryComponent, CartComponent, CheckoutComponent, PageNotFoundComponent, ProductDetailComponent],
  imports: [
    CommonModule,
    RouterModule,
    AppRoutingModule
  ],
  
  exports:[
    StoreComponent //Para hacerlo público 
  ],
  providers:[Cart,ModelModule],
}
)

export class StoreModule { }
