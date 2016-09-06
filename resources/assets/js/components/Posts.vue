<template>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Blog</div>

                  <div class="panel-body">
                      <ul class="list-unstyled">
                        <li v-for="post in posts"><a href="{{ post.url }}">{{ post.title }}</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  ready() {
    this.fetchPosts();

    setInterval(function () {
      this.fetchPosts();
    }.bind(this), 5000);
  },
  data () { /* ES2015 equivalent for: `data: function () {` */
    return {
      posts: [],
      message: 'Hello World!'
    };
  },

  methods: {
    fetchPosts() {
      var self = this;
      $.get('api/posts', function( posts ) {
          self.$set('posts', posts);
      });
    }
  }
};
</script>

<style>
.hero {
  background: #eee;
  padding: 1em;
}
</style>
