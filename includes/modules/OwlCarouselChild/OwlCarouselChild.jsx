// External Dependencies
import React, { Component } from 'react';
import $ from "jquery";

// Internal Dependencies
import './style.css';
import '../../../styles/owl.carousel.min.css';
import '../../../scripts/owl.carousel.min.js';
import image from '../../../img/owl_slider_left.png';




class OwlCarouselChild extends Component {

  static slug = 'owl_carousel_child';

  render() {
    //const Content = this.props.content;

    return (

      // <div class="music-img-box item">
      //     <a href="https://open.spotify.com/track/5yxTv8Na3xU840LygHYkzD?si=c29d36ef956d4ef2" target="_blank">
      //         <img loading="lazy" width="300" height="300" decoding="async" class="music-img" src="https://amodaintdev.wpengine.com/wp-content/uploads/2023/05/Madness.jpg"/>
      //         <div class="music-info">
      //             <div class="song-info">
      //                 <p class="song-name">asd</p>
      //                 <p class="artist-name">MIST</p>
      //             </div> 
      //         </div>
      //     </a>
      // </div> 
      <div>{this.props.label}</div>

    );
    // return null;
  }

  componentDidMount() {
    console.log("test log2");


  }
}

export default OwlCarouselChild;
