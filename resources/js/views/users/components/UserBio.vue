<template>
  <el-card class="box-card user-bio">
    <div slot="header" class="clearfix">
      <span>About me</span>
    </div>
    <div class="user-education user-bio-section">
      <div class="user-bio-section-header">
        <svg-icon icon-class="education" />
        <span>Education</span>
      </div>
      <div class="user-bio-section-body">
        <div
          class="text-muted"
        >B.S. in Computing from the Alejandro de Humboldt University of the city of Caracas \ Venezuela</div>
      </div>
    </div>
    <div class="user-skills user-bio-section">
      <div class="user-bio-section-header">
        <svg-icon icon-class="skill" />
        <span>Skills</span>
      </div>
      <div class="user-bio-section-body">
        <div class="progress-item">
          <span>Laravel</span>
          <el-progress :percentage="90" />
        </div>
        <div class="progress-item">
          <span>MySQl</span>
          <el-progress :percentage="90" />
        </div>
        <div class="progress-item">
          <span>JavaScript</span>
          <el-progress :percentage="100" />
        </div>
        <div class="progress-item">
          <span>Vue</span>
          <el-progress :percentage="90" />
        </div>
        <div class="progress-item">
          <span>React</span>
          <el-progress :percentage="55" />
        </div>
        <div class="progress-item">
          <span>HTML &amp; CSS</span>
          <el-progress :percentage="100" status="success" />
        </div>
      </div>
    </div>
  </el-card>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.user-bio {
  margin-top: 20px;
  color: #606266;
  span {
    padding-left: 4px;
  }
  .user-bio-section {
    font-size: 14px;
    padding: 15px 0;
    .user-bio-section-header {
      border-bottom: 1px solid #dfe6ec;
      padding-bottom: 10px;
      margin-bottom: 10px;
      font-weight: bold;
    }
  }
}
</style>
