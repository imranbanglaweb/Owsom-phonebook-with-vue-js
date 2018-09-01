<template>
<div class="modal" :class="openmodal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">{{list.name}}</p>
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
      <button class="button is-success" @click='update'>Updated</button>
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
				list:{},
				errors:{}
			}
		},
		methods:{
			close(){
				this.$emit('closeRequest')
			},
			update(){
			axios.defaults.baseURL = 'http://localhost/phonebook';
			axios.patch(`/phonebook/${this.list.id}`,this.$data.list).then((response)=>this.close())
  				.catch((error) =>this.errors=error.response.data.errors);
			}


		}
	}
</script>