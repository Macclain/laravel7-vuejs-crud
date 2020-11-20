<template>
	<div>
		<div class="content container">
                    <h1>CRUD2 Operation with Laravel and Vue.js</h1>
                    <hr/>
                    <div class="row">
                    <div v-if="!showEdit" class="col-md-4 sidebar" id="add-div">
                        <p class="text-center alert alert-danger" v-bind:class="{hidden: !hasError}">
                            Please fill all the fields
                        </p>
                        <div class="form-group">
                            <label for="name">Name: </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" v-model="newItem.name" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Age: </label>
                            <input type="text" name="age" id="age" class="form-control" placeholder="Enter your age" v-model="newItem.age" required>
                        </div>
                        <div class="form-group">
                            <label for="profession">Profession: </label>
                            <input type="text" name="profession" id="profession" class="form-control" placeholder="Enter your profession" v-model="newItem.profession" required>
                        </div>
                        <button class="btn btn-primary" @click.prevent="createItem()">
                            <span class="Plus"></span>ADD
                        </button>
                    </div>

                    <div v-if="showEdit" @close="showEdit=false" class="col-md-4 sidebar" id="edit-div">
                        <input type="hidden" name="e_id" id="e_id" class="form-control" :value="this.e_id" required>
                        <div class="form-group">
                                <label for="name">Name: </label>
                                <input type="text" name="e_name" id="e_name" class="form-control" :value="this.e_name" required>
                            </div>
                            <div class="form-group">
                                <label for="age">Age: </label>
                                <input type="text" name="e_age" id="e_age" class="form-control" :value="this.e_age" required>
                            </div>
                            <div class="form-group">
                                <label for="profession">Profession: </label>
                                <input type="text" name="e_profession" id="e_profession" class="form-control" :value="this.e_profession" required>
                            </div>

                        <button class="btn btn-default" @click="showEdit=false; showAddDiv()">
                        Cancel
                        </button>

                        <button class="btn btn-info" @click="editItem()">
                        Update
                        </button>
                    </div>

                    <div class="col-md-8">
                        <table class="table table-borderless" id="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Profession</th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tr v-for="item in items">
                                <td>@{{item.id}}</td>
                                <td>@{{item.name}}</td>
                                <td>@{{item.age}}</td>
                                <td>@{{item.profession}}</td>
                                <td id="show-modal" @click.prevent="showEdit=true; setVal(item.id, item.name, item.age, item.profession)" class="btn-info">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                  <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                </svg></td>

                                <td @click.prevent="deleteItem(item)" class="btn-danger">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg></td>
                            </tr>
                        </table>

                    </div>
                    </div>
                    
                </div>
	</div>
</template>