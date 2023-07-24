// External Dependencies
import React, { Component } from 'react';
import $ from "jquery";

// Internal Dependencies
import './style.css';
import '../../../styles/owl.carousel.min.css';
import '../../../styles/owl.theme.default.min.css';
import '../../../scripts/owl.carousel.min.js';
import image from '../../../img/owl_slider_left.png';
import emptyImage from '../../../img/no-photo-available.png';
import left_icon from '../../../img/owl_slider_left.png';
import right_icon from '../../../img/owl_slider_right.png';



class OwlCarousel extends Component {

  static slug = 'owl_carousel';
  owl_status = false;


  render() {
    const Items = this.props.content;
    const lazyClass = this.lazy_class();
    const lazyStat = this.check_yes_no('slider_item_lazyload','false');
    console.log("render");
    console.log(Items);
    
    if(!Items.length){
      console.log(Items.length+" - Array is Empty");
      return (
        <div className="divi-custom-slider owl-carousel owl-theme">
           <div class="music-img-box item">
            <a href="https://open.spotify.com/track/5yxTv8Na3xU840LygHYkzD?si=c29d36ef956d4ef2" target="_blank">
              <img loading="lazy" width="300" height="300" decoding="async" class="music-img" src="https://amodaintdev.wpengine.com/wp-content/uploads/2023/05/Madness.jpg"/>
              <div class="music-info">
                <div class="song-info">
                  <p class="song-name">asd</p>
                  <p class="artist-name">MIST</p>
                </div> 
              </div>
            </a>
            </div> 
        </div>
        );
    }else{
      return (
        <div className="divi-custom-slider owl-carousel owl-theme">
            {Items.map((item, index) => (
            <div className="single-item item">
              <a href="https://open.spotify.com/track/5yxTv8Na3xU840LygHYkzD?si=c29d36ef956d4ef2" target="_blank">
                  <img className={Array.prototype.join.call(["single-img",lazyClass,item.props.attrs.slider_image_fit ? item.props.attrs.slider_image_fit : "none",]," ")} style={{width:item.props.attrs.single_width}} src={!item.props.attrs.slider_image ? emptyImage : item.props.attrs.slider_image} data-src={lazyStat? (!item.props.attrs.slider_image ? emptyImage : item.props.attrs.slider_image):''}/>
                  <div className="single-info">
                      <div className="single-content">
                          <div style={{ whiteSpace: "pre-wrap"}} dangerouslySetInnerHTML={{__html:item.props.attrs.single_content}}></div>
                      </div>
                      <div className="single-extra"></div>
                  </div>
              </a>
            </div>
    
              ))}
        </div>
        );
    }

  }

  lazy_class(){
    const lazy=this.check_yes_no('slider_item_lazyload','false') ? 'owl-lazy' : '';
    return lazy;
  }
  
  componentDidMount() {

    var self = this;
    $(document).ready(function() {
      console.log("ready!");
      self.carousel_init();
    });
    console.log("Did MOunt()");
  }

  shouldComponentUpdate(nextProps, nextState){
    for (const prop in this.props) {

      // if(this.props[prop] instanceof Object){
      //           console.log(this.props[prop]);        // console.log(this.props[prop]);
      //   // console.log(nextProps[prop]);
      //   console.log(nextProps[prop]);
      // }
      if (this.props[prop] !== nextProps[prop]) {
        // The prop has changed
        // console.log(this.props[prop]+" - "+nextProps[prop]);
        // console.log(this.props[prop]);
        // console.log(nextProps[prop]);
        // console.log(prop);

        if(this.props[prop] instanceof Object){
          if (prop === "content" && this.props["content"].length !== nextProps["content"].length) {
            this.owl_destroy();
          }
        }else{
          this.owl_destroy();
        }

        // break;
      }
    } 
    // this.check_props_status(nextProps);
    console.log("shouldComponentUpdate");

    return true;
  }

  check_props_status(props_data){
    console.log(props_data.slider_item_count);
    console.log(this.props.slider_item_count);
  }
  

  componentDidUpdate(prevProps) {
    // console.log(prevProps);
    // for (const prop in this.props) {
    //   // console.log(this.props[prop]);
    //   if (this.props[prop] !== prevProps[prop]) {
    //     // The prop has changed
    //     console.log(this.props[prop]+" - "+prevProps[prop]);

    //     // break;
    //   }
    // } 
    console.log("Did Update");
    if(!this.owl_status){
      this.carousel_init();
    }
    
  }

  check_yes_no(option_slug,default_val){
    const val = this.props[option_slug]?this.props[option_slug]:default_val;
    if(val == 'on' || val == 'true'){
        return true;
    }else{
        return false;
    }
}



  carousel_init(){
    console.log("Carousel Init");
    const slider_count = this.props.slider_item_count;
    const slider_margin = this.props.slider_item_space ? parseInt(this.props.slider_item_space, 10) : 0;
    const slider_autoTimeOut = this.props.slider_item_autoplay_timeout ? parseInt(this.props.slider_item_autoplay_timeout, 10) : 5000;
    const slider_autoSpeed = this.props.slider_item_autoplay_speed ? parseInt(this.props.slider_item_autoplay_speed, 10) : 'false';
    const slider_navSpeed = this.props.slider_item_nav_speed ? parseInt(this.props.slider_item_nav_speed, 10) : 'false';
    const slider_dotSpeed = this.props.slider_item_dot_speed ? parseInt(this.props.slider_item_dot_speed, 10) : 'false';
    const slider_nav = this.check_yes_no('slider_item_navigation','true');
    const slider_center = this.check_yes_no('slider_item_center','true');
    const slider_dots = this.check_yes_no('slider_item_dots','true');
    const slider_loop = this.check_yes_no('slider_item_loop','true');
    const slider_lazyLoad = this.check_yes_no('slider_item_lazyload','false');
    const slider_mouseDrag = this.check_yes_no('slider_item_mouse_drag','true');
    const slider_touchDrag = this.check_yes_no('slider_item_touch_drag','true');
    const slider_autoWidth = this.check_yes_no('slider_item_auto_width','false');
    const slider_rewind = this.check_yes_no('slider_item_rewind','true');
    const slider_dotsEach = this.check_yes_no('slider_item_dots_each','false');
    const slider_autoplay = this.check_yes_no('slider_item_autoplay','false');
    const slider_hoverPause = this.check_yes_no('slider_item_autoplay_hover_pause','false');
    console.log(slider_dots+'- Dots');
    console.log(slider_nav+'- Nav');

    var owl2 = $(".divi-custom-slider.owl-carousel");
    owl2.owlCarousel({
        margin: slider_margin,
        nav:slider_nav,
        dots:slider_dots,
        loop:slider_loop,
        lazyLoad:slider_lazyLoad,
        center:slider_center,
        mouseDrag:slider_mouseDrag,
        touchDrag:slider_touchDrag,
        autoWidth:slider_autoWidth,
        rewind:slider_rewind,
        dotsEach:slider_dotsEach,
        autoplay:slider_autoplay,
        autoplayTimeout:slider_autoTimeOut,
        autoplaySpeed:slider_autoSpeed,
        navSpeed:slider_navSpeed,
        dotsSpeed:slider_dotSpeed,
        autoplayHoverPause:slider_hoverPause,
        navText: [
          `<img src="${left_icon}"/>`,
          `<img src="${right_icon}"/>`,
        ],
        responsive: {
          0: {
            items: 1,
            nav: false,
            stagePadding: 5,
          },
          600: {
            items: 2,
            stagePadding: 10,
          },
          1000: {
            items: slider_count,
            stagePadding: 0,
          }
        }
    });
    this.owl_status = true;
  }

  owl_destroy(){
    var owl2 = $(".divi-custom-slider.owl-carousel");
    owl2.trigger('destroy.owl');
    console.log("owl destroyed");
    this.owl_status = false;
  }


}

export default OwlCarousel;
