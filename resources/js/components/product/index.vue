 <template>
      <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">All Product</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row card container">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Employee Insert 
            <router-link to="/store-product" class="btn btn-sm btn-info" id="add_new"> Add New</router-link>
          </div>
          <div class="card-body">
          
          <div class="card-body">
              <div class="table-responsive">
                <label>Search</label>
                <input type="text" v-model="searchItem"  class="form-control" style="width:200px; "><br>
                <table class="table table-bordered" id="" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Photo</th>
                      <th>Code</th>
                      <th>category</th>
                      <th>Buying Price</th>
                      <th>selling Price</th>
                      <th>root</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <tr v-for="product in filterSearch" :key="product.id">
                      <td>{{product.product_name}}</td>
                      <td><img :src="product.image" id="em_photo"></td>
                      <td>{{product.code}}</td>
                      <td>{{product.category_name}}</td>
                      <td>{{product.buying_price}}</td>
                       <td>{{product.selling_price}}</td>
                        <td>{{product.root}}</td>

                      <td>
                        <router-link :to="{name: 'edit-product',params:{id:product.id}}" class="btn btn-sm btn-info">Edit</router-link>
                        <a @click="deleteProduct(product.id)" class="btn btn-sm btn-danger">Delete</a>
                      </td>
                    </tr>
        
                   </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
       </div>
   </div>
</template>

<script>

    export default {
    mounted(){
            if (!User.loggedIn()) {
               this.$router.push({ name:'/' })
            } 
        },
        data()
        {
            return{
                products:[],
                searchItem:''
            }
            
        },
        computed:
        {
            filterSearch()
            {
                return this.products.filter(product=>{
                    return product.product_name.match(this.searchItem);
                })
            }
        },
        methods:
        {
            allProduct()
                {
                    axios.get('/api/product/')
                    .then(({data})=> (this.products=data))
                    .catch()
                },
                deleteProduct(id)
                {
                    Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.value) {
                        axios.delete('/api/product/'+id)
                        .then(()=>{
                            this.products=this.products.filter(product=>{
                                return product.id !=id
                            })
                        })
                        .catch(console.log('error'))
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                    })
                }
                
            
        },
        created()
        {
            this.allProduct();
        }
        	
    }



  
</script>

<style>
#add_new{
    float:right;
}
	
#em_photo{
    height:40px;
    width:40px;
}

</style>
