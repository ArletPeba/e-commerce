import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';

//Valores constantes
const PROTOCOL = 'http';
//const PORT='3306';

@Injectable({
  providedIn: 'root'
})
export class ProductDatasourceService {

  private baseURL: string;
  private port: string = "80";

  constructor(private httpClient:HttpClient) {
   // this.baseURL=`${PROTOCOL}://${location.hostname}:${PORT}/ecommerce/api`;
   //puente para hacer peticiones al servidor 
   // this.baseURL=`${PROTOCOL}://${location.hostname}:${this.port}/phpSlim/ecommerce/api`;
    this.baseURL=`${PROTOCOL}://${location.hostname}:${this.port}/ecommerce/api`;
   };

   getProducts():any{
    return this.httpClient.get(this.baseURL + '/products');
   }
   getProductsScale():any{
    return this.httpClient.get(this.baseURL + '/products');
   }
   getProductsVendor():any{
    return this.httpClient.get(this.baseURL + '/products');
   }
}
