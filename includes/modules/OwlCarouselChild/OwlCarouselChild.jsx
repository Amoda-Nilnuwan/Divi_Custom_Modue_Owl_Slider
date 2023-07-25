// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';
import '../../../styles/owl.carousel.min.css';
import '../../../scripts/owl.carousel.min.js';


class OwlCarouselChild extends Component {

  static slug = 'owl_carousel_child';

  render() {

    return (

      <div>{this.props.label}</div>

    );

  }

  componentDidMount() {

  }

}

export default OwlCarouselChild;
