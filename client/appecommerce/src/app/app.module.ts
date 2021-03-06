import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { StoreModule } from './store/store.module';
import { HttpClientModule } from '@angular/common/http';
import { Cart } from './model/cart';
import { StoreComponent } from './store/store.component';
import { ProductDetailComponent } from './store/product-detail/product-detail.component';




@NgModule({
  declarations: [
    AppComponent,
   
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    StoreModule,
    HttpClientModule,
   
    
  ],
  
  providers: [Cart],
  bootstrap: [AppComponent]
  
})
export class AppModule { }
