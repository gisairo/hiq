<template>
  <div>
    <h1>Create A Smart Device</h1>
    <form @submit.prevent="addSmartDevice">
      <div class="row">
         <section v-if="errored.serialerrormessage!=true" class="warn col-md-6 " style="margin-bottom: 20px">
            <p class="alert alert-danger">{{ errored.serialerrormessage }}</p>
          </section>
          <p></p>
        <div class="col-md-6">
          <div class="form-group">
            <label>Smart Device Title:</label>
            <input type="text" class="form-control" v-model="smartdevice.serial">
          </div>
        </div>
        </div>
        <div class="row">
          <section v-if="errored.descriptionerrormessage!=true" class="warn col-md-6 " style="margin-bottom: 20px">
            <p class="alert alert-danger">{{ errored.descriptionerrormessage }}</p>
          </section>
          <p></p>
          <div class="col-md-6">
            <div class="form-group">
              <label>Smart Device Description:</label>
              <textarea class="form-control" v-model="smartdevice.description" rows="5"></textarea>
            </div>
          </div>
        </div><br />
        <div class="row">
          <section v-if="errored.manufacturererrormessage!=true" class="warn col-md-6 " style="margin-bottom: 20px">
            <p class="alert alert-danger">{{ errored.manufacturererrormessage }}</p>
          </section>
          <p></p>
          <div class="col-md-6">
            <select v-model="manufacturer" required="required">
                  <option value='0' >Select Manufacturer</option>
                   <option v-for="manufacturer in manufacturers" v-bind:value="{ id: manufacturer.id, text: manufacturer.name }">{{ manufacturer.name }}
                   </option>
               </select>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Create</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
          return {
            smartdevice:{},
            manufacturer: 0,
            manufacturers:[],
            errored: {
              manufacturererrormessage: true,
              serialerrormessage: true,
              descriptionerrormessage: true,
            },
          };
        },
        created(){
          let manufacturer_uri = `{{URL::to('/')}}/api/manufacturers`;
          this.axios.get(manufacturer_uri).then((response2) => {
              this.manufacturers = response2.data.data;
          });
        },
        methods: {
          addSmartDevice(){
            // console.log(this.post);
            let uri = '{{URL::to('/')}}/api/smartdevice/create';
            let data = {smartdevice: this.smartdevice, manufacturer:this.manufacturer};
            this.axios.post(uri, data).then((response) => {
               this.$router.push({name: 'smartdevices'});
            }).catch(error => {
                // console.log(error)
                // console.log(typeof(manufacturer));
                if(typeof(manufacturer) == "undefined" ){
                  this.errored.manufacturererrormessage = "Smart Device Manufacturer is Required";
                  // this.errored = true;
                }else{
                  this.errored.manufacturererrormessage = true;
                };
                if(typeof(this.smartdevice.serial) == "undefined"){
                  this.errored.serialerrormessage = "Smart Device Serial is Required";
                  // this.errored = true;
                }else{
                  this.errored.serialerrormessage = true;
                }
                if(typeof(this.smartdevice.description) == "undefined"){
                  this.errored.descriptionerrormessage = "Smart Device Description Required"
                  // this.errored = true;
                }else{
                  this.errored.descriptionerrormessage = true;
                }
                
            });
          }
        }
  }
</script>