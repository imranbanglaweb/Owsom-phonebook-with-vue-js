<template>
<div class="modal" :class="openmodal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modal title</p>
      <button class="delete" aria-label="close"  @click='close'></button>
    </header>
    <section class="modal-card-body">
     <div class="field">
	  <div class="control">
	    <input class="input is-primary" :class="{'is-danger':errors.name}" type="text" placeholder="Name" v-model="list.name">
	  </div>
	    <small class="has-text-danger" v-if="errors.name">{{errors.name[0]}}</small>
	</div>
     <div class="field">
	  <div class="control">
	    <input :class="{'is-danger':errors.phone}" class="input is-primary" type="number" placeholder="number" v-model="list.phone">
	  </div>
	  <small class="has-text-danger" v-if="errors.phone">{{errors.phone[0]}}</small>
	</div>
     <div class="field">
	  <div class="control">
	    <input :class="{'is-danger':errors.email}" class="input is-primary" type="email" placeholder="email" v-model="list.email">
	  </div>
	    <small class="has-text-danger" v-if="errors.email">{{errors.email[0]}}</small>
	</div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click='save'>Save changes</button>
      <button class="button" @click='close'>Cancel</button>
    </footer>
  </div>
</div>
</template>
<script>
	export default{
		props:['openmodal'],
		data(){
			return{
				list:{
					name:'',
					phone:'',
					email:''
				},
				errors:{}
			}
		},
		methods:{
			close(){
				this.$emit('closeRequest')
			},
			save(){
			axios.defaults.baseURL = 'http://localhost/phonebook';
			axios.post('/phonebook',this.$data.list).then((response)=>
				{
					this.close()
					this.$parent.lists.push(response.data)
				})
  				.catch((error) =>this.errors=error.response.data.errors);
  				this.list=''
			}


		}
	}
</script>