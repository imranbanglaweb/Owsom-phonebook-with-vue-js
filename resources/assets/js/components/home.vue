<template>
  <div>
    <nav class="panel column is-offset-2 is-8">
  <p class="panel-heading">
    Phone Book
      <div class="panel-block">
    <button class="button is-link is-outlined" @click="openAdd">
      Add New
    </button>
  </div>
  </p>
  <div class="panel-block">
    <p class="control has-icons-left">
      <input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
      <span class="icon is-small is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
    </p>
  </div>

  <a class="panel-block" v-for="item,key in temp">
    <span class="column is-4">
      {{item.name}}
    </span>
    <span class="column is-4">
      {{item.phone}}
    </span>

    <span class="panel-icon column is-1">
      <p class="button is-success is-small" @click="openUpdate(key)">Edit</p>
    </span>

    <span class="panel-icon column is-1">
      <!-- <i class="fa fa-book" aria-hidden="true"></i> -->
       <p class="button is-danger is-small" @click="del(key,item.id)">Delete</p>

    </span>

    <span class="panel-icon column is-1">
       <p class="button is-primary is-small" @click="openShow(key)">Details</p>
    </span>

  </a>
  <br>
</nav>
<Add :openmodal='addActive' @closeRequest='close'></Add>
<Show :openmodal='showActive' @closeRequest='close'></Show>
<Update :openmodal='updateActive' @closeRequest='close'></Update>
  </div>
</template>
<script>
  let Add =require('./Add.vue');
  let Show =require('./show.vue');
  let Update =require('./update.vue');
  export default{
    components:{Add,Show,Update},
    data(){
        return{
          addActive:'',
          showActive:'',
          updateActive:'',
          searchQuery:'',
          lists:{},
          errors:{},
          temp:{},
        }
    },
      mounted(){
      axios.defaults.baseURL = 'http://localhost/phonebook';
      axios.post('/getData')
      .then((response)=>this.lists=this.temp=response.data)
          .catch((error) =>this.errors=error.response.data.errors);
    },
    watch:{
        searchQuery(){
          if (this.searchQuery.length >0) {
              this.temp =this.lists.filter((item) =>{
              return  Object.keys(item).some((key)=>
                  {
                    let string =String(item[key])
                     return string.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
                  })
                 
              });

          }
          else{
            this.temp =this.lists
          }

        }
    },
    methods:{
      openAdd(){
        this.addActive ='is-active';
      },
       openShow(key){
        this.$children[1].list = this.temp[key]
        this.showActive ='is-active';
      },
      openUpdate(key){
         this.$children[2].list = this.temp[key]
        this.updateActive ='is-active';
      },
     
      del(key,id){
        if (confirm("Are you Sure to Deleted !")) {
      axios.defaults.baseURL = 'http://localhost/phonebook';
        axios.delete(`/phonebook/${id}`)
      .then((response)=>{this.lists.splice(key,1)})
          .catch((error) =>this.errors=error.response.data.errors)
        }
        
    },
  
      close(){
        this.addActive =this.showActive=this.updateActive='';
      },

    }
  }
</script>