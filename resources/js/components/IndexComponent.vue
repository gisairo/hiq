<template>
  <div>
      <h1>Smartdevices</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'create' }" class="btn btn-primary">Create Smartdevice</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Smartdevice Serial</th>
                <th>Smartdevice Description</th>
                <th>Smartdevice manufacturer</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="smartdevice in smartdevices" :key="smartdevice.id">

                    <td>{{ smartdevice.id }}</td>
                    <td>{{ smartdevice.serial }}</td>
                    <td>{{ smartdevice.description }}</td>
                    <td>{{ smartdevice.manufacturer.name }}</td>
                    <td><router-link :to="{name: 'edit', params: { id: smartdevice.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click.prevent="deleteSmartdevice(smartdevice.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      
      data() {
        return {
          smartdevices: []
        }
      },
      created() {
      let uri = '{{URL::to('/')}}/api/smartdevices';
      this.axios.get(uri).then(response => {
        this.smartdevices = response.data.data;
      });
    },
    methods: {
      deleteSmartdevice(id)
      {
        let uri = `{{URL::to('/')}}/api/smartdevice/delete/${id}`;
        this.axios.delete(uri).then(response => {
          this.smartdevices.splice(this.smartdevices.indexOf(id), 1);
        });
      }
    }
  }
</script>