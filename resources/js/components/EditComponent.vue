<template>
  <div>
    <h1>Edit Smartdevice</h1>
    <form @submit.prevent="updatesmartdevice">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Smartdevice Serial:</label>
            <input type="text" class="form-control" v-model="smartdevice.serial" >
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Smartdevice Description:</label>
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
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
</template>

<script>
    
    export default {
          // options:manufacturers
      // cat: '1',
      data() {
        return {
          smartdevice: {},
          manufacturer: 0,
          manufacturers:[],
        }
      },
      created() {
        let uri = `http://hydroiq.test/api/smartdevice/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.smartdevice = response.data;
        });
        let uri2 = `http://hydroiq.test/api/manufacturers`;
        this.axios.get(uri2).then((response2) => {
            this.manufacturers = response2.data.data;
            // console.log(this.manufacturers);
        });
      },
      methods: {
        updatesmartdevice() {
          let uri = `http://hydroiq.test/api/smartdevice/update/${this.$route.params.id}`;
          let data2 = {smartdevice: this.smartdevice, manufacturer:this.manufacturer};
          this.axios.post(uri, data2).then((response) => {
            this.$router.push({name: 'smartdevices'});
          });
        },
      }
    }
</script>