<template>
  <div>
    <h1>Create A Smart Device</h1>
    <form @submit.prevent="addSmartDevice">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Smart Device Title:</label>
            <input type="text" class="form-control" v-model="smartdevice.serial">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Smart Device Body:</label>
              <textarea class="form-control" v-model="smartdevice.description" rows="5"></textarea>
            </div>
          </div>
        </div><br />
        <div class="row">
          <div class="col-md-6">
            <select v-model="manufacturer">
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
          };
        },
        created(){
          let manufacturer_uri = `http://hydroiq.test/api/manufacturers`;
          this.axios.get(manufacturer_uri).then((response2) => {
              this.manufacturers = response2.data.data;
          });
        },
        methods: {
          addSmartDevice(){
            // console.log(this.post);
            let uri = 'http://hydroiq.test/api/smartdevice/create';
            let data = {smartdevice: this.smartdevice, manufacturer:this.manufacturer};
            this.axios.post(uri, data).then((response) => {
               this.$router.push({name: 'smartdevices'});
            });
          }
        }
  }
</script>