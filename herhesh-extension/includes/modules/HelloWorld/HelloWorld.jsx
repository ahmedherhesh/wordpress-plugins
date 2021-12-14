// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class HelloWorld extends Component {

  static slug = 'heex_hello_world';

  render() {
    const Content = this.props.content;
    const Ahmed = this.props.ahmed;
    return (
      <h1>
        <Ahmed/>
        <Content/>
      </h1>
    );
  }
}

export default HelloWorld;
