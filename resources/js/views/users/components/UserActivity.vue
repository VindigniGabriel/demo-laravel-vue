<template>
  <el-card v-if="user.name">
    <el-tabs v-model="activeActivity" @tab-click="handleClick">
      <el-tab-pane label="Activity" name="first">
        <div class="user-activity">
          <div class="post">
            <div class="user-block">
              <span class="username text-muted">Frontend</span>
              <span class="description">Development experience</span>
            </div>
            <p>Experience in the development of SPA applications, with VueJS, Vuex, Vue Router, and different frameworks with Vue UI components</p>
          </div>
          <div class="post">
            <div class="user-block">
              <span class="username text-muted">Backend</span>
              <span class="description">Development experience</span>
            </div>
            <p>Experience in the development of applications with the use of Laravel, MySQL, APIs and Different Packages, in other opportunities I have also used Firebase Google.</p>
          </div>
          <div class="post">
            <div class="user-block">
              <span class="username">Skills</span>
              <span class="description">Development experience</span>
            </div>
            <div class="user-images">
              <el-carousel :interval="2000" type="card" height="200px">
                <el-carousel-item v-for="item in carouselImages" :key="item">
                  <img :src="item" class="image" />
                </el-carousel-item>
              </el-carousel>
            </div>
          </div>
        </div>
      </el-tab-pane>
      <el-tab-pane label="Chronology" name="second">
        <div class="block">
          <el-timeline>
            <el-timeline-item timestamp="2016" placement="top">
              <el-card>
                <h4>The beggining...</h4>
                <p>HTML, CSS, JS y PHP</p>
              </el-card>
              <el-card>
                <h4>A bit later...</h4>
                <p>MySQL, jQuery and AJAX</p>
              </el-card>
            </el-timeline-item>
            <el-timeline-item timestamp="2017" placement="top">
              <el-card>
                <h4>Looking for developing speed...</h4>
                <p>Laravel, Bootstrap and others libraries y packages...</p>
              </el-card>
            </el-timeline-item>
            <el-timeline-item timestamp="2018" placement="top">
              <el-card>
                <h4>One more step in JS...</h4>
                <p>Vue, Vue Router, Vuex, Vuetify, Axios and others libraries...</p>
              </el-card>
              <el-card>
                <h4>A bit later...</h4>
                <p>
                  Firebase Google, check:
                  <a href="http://gpcg-movilnet.web.app/" target="_blank">Demo App</a> &
                  <a href="https://youtu.be/r8AQHfPM4X0" target="_blank">Demo Video</a>
                </p>
              </el-card>
            </el-timeline-item>
            <el-timeline-item timestamp="2020" placement="top">
              <el-card>
                <h4>Strengthening frontend programming...</h4>
                <p>React</p>
              </el-card>
            </el-timeline-item>
          </el-timeline>
        </div>
      </el-tab-pane>
      <el-tab-pane v-loading="updating" label="Account" name="third">
        <el-form-item label="Name">
          <el-input v-model="user.name" :disabled="user.role === 'admin'" />
        </el-form-item>
        <el-form-item label="Email">
          <el-input v-model="user.email" :disabled="user.role === 'admin'" />
        </el-form-item>
        <el-form-item>
          <el-button type="primary" :disabled="user.role === 'admin'" @click="onSubmit">Update</el-button>
        </el-form-item>
      </el-tab-pane>
    </el-tabs>
  </el-card>
</template>

<script>
import Resource from '@/api/resource';
const userResource = new Resource('users');

export default {
  props: {
    user: {
      type: Object,
      default: () => {
        return {
          name: '',
          email: '',
          avatar: '',
          roles: [],
        };
      },
    },
  },
  data() {
    return {
      activeActivity: 'first',
      carouselImages: [
        'https://ubunlog.com/wp-content/uploads/2020/03/laravel.jpeg',
        'https://www.ma-no.org/cache/galleries/contents-1790/460-300/vuejs.jpg',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSiT2TyzaZ7Xk1YuUHwYRBmqI1o7VWsg6dj5nsJaE8CwAUCgFO4&usqp=CAU',
        'https://codigoonclick.com/wp-content/uploads/2019/05/practice-javascript-and-learn-functions-400x277.png',
        'https://firebase.google.com/images/social.png',
        'data:image/png;base64,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',
        'data:image/png;base64,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',
      ],
      updating: false,
    };
  },
  methods: {
    handleClick(tab, event) {
      console.log('Switching tab ', tab, event);
    },
    onSubmit() {
      this.updating = true;
      userResource
        .update(this.user.id, this.user)
        .then(response => {
          this.updating = false;
          this.$message({
            message: 'User information has been updated successfully',
            type: 'success',
            duration: 5 * 1000,
          });
        })
        .catch(error => {
          console.log(error);
          this.updating = false;
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.user-activity {
  .user-block {
    .username,
    .description {
      display: block;
      margin-left: 50px;
      padding: 2px 0;
    }
    img {
      width: 40px;
      height: 40px;
      float: left;
    }
    :after {
      clear: both;
    }
    .img-circle {
      border-radius: 50%;
      border: 2px solid #d2d6de;
      padding: 2px;
    }
    span {
      font-weight: 500;
      font-size: 12px;
    }
  }
  .post {
    font-size: 14px;
    border-bottom: 1px solid #d2d6de;
    margin-bottom: 15px;
    padding-bottom: 15px;
    color: #666;
    .image {
      width: 100%;
    }
    .user-images {
      padding-top: 20px;
    }
  }
  .list-inline {
    padding-left: 0;
    margin-left: -5px;
    list-style: none;
    li {
      display: inline-block;
      padding-right: 5px;
      padding-left: 5px;
      font-size: 13px;
    }
    .link-black {
      &:hover,
      &:focus {
        color: #999;
      }
    }
  }
  .el-carousel__item h3 {
    color: #475669;
    font-size: 14px;
    opacity: 0.75;
    line-height: 200px;
    margin: 0;
  }

  .el-carousel__item:nth-child(2n) {
    background-color: #99a9bf;
  }

  .el-carousel__item:nth-child(2n + 1) {
    background-color: #d3dce6;
  }
}
</style>
