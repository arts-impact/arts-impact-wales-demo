<?php

// The HTML tags portion of our styleguide template

  ?>

  <section class="sg-section">
    <h2 class="sg-section-header">Headings</h2>

    <h1>Header one</h1>
    <h2>Header two</h2>
    <h3>Header three</h3>
    <h4>Header four</h4>
    <h5>Header five</h5>
    <h6>Header six</h6>
  </section>

  <section class="sg-section">
    <h2 class="sg-section-header">Paragraph text</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi est aliquid, maiores quis impedit illo, quo reiciendis a molestias molestiae, necessitatibus. Aperiam ipsum praesentium voluptates tempore repudiandae accusamus molestiae aspernatur. Assumenda pariatur ipsum quidem tempora ea natus aliquid obcaecati excepturi accusamus neque rerum voluptate repellendus soluta expedita cupiditate sequi eius quisquam eveniet cumque, totam aperiam dolorem deserunt dignissimos. Cupiditate, quibusdam. Asperiores eveniet quidem earum fuga voluptate hic voluptatem atque soluta deleniti qui ab, laboriosam quae, perferendis voluptates, consequuntur inventore. Commodi dolore quod molestias fugit quae veniam, provident neque maiores consectetur.</p>


    <h2 class="sg-section-header">Preformatted Tag</h2>
    <p>This tag styles large blocks of code.</p>
<pre>
.post-title {
  margin: 0 0 5px;
  font-weight: bold;
  font-size: 38px;
  line-height: 1.2;
}</pre>

    <h2 class="sg-section-header">Address Tag</h2>
    <address>1 Infinite Loop<br>
    Cupertino, CA 95014<br>
    United States</address>
  
    <h2 class="sg-section-header">Inline Tags</h2>
    <p>Anchor Tag (aka. Link): This is an example of a <a title="Apple" href="http://apple.com">link</a>. Abbreviation Tag: The abbreviation <abbr title="Seriously">srsly</abbr> stands for “seriously”. Acronym Tag: The acronym <acronym title="For The Win">ftw</acronym> stands for “for the win”. Big Tag: These tests are a <big>big</big> deal, but this tag is no longer supported in HTML5. Cite Tag: “Code is poetry.” —<cite>Automattic</cite>. Code Tag: You will learn later on in these tests that <code>word-wrap: break-word;</code> will be your best friend. Delete Tag: This tag will let you <del>strikeout text</del>, but this tag is no longer supported in HTML5 (use the <code>&lt;strike&gt;</code> instead). Emphasize Tag: The emphasize tag should <em>italicize</em> text. Insert Tag: This tag should denote <ins>inserted</ins> text. Keyboard Tag: This scarsly known tag emulates <kbd>keyboard text</kbd>, which is usually styled like the <code>&lt;code&gt;</code> tag. Quote Tag: <q>Developers, developers, developers…</q> –Steve Ballmer. Strong Tag: This tag shows <strong>bold text.</strong> Subscript Tag: Getting our science styling on with H<sub>2</sub>O, which should push the “2” down. Superscript Tag: Still sticking with science and Albert Einstein’s&nbsp;E = MC<sup>2</sup>, which should lift the “2” up. Teletype Tag: This rarely used tag emulates <tt>teletype text</tt>, which is usually styled like the <code>&lt;code&gt;</code> tag. Variable Tag: This allows you to denote <var>variables</var>.</p>

  </section>

  <section class="sg-section">
    <h2 class="sg-section-header">Blockquotes</h2>
    <h4>Single line blockquote:</h4>
    <blockquote><p>Stay hungry. Stay foolish.</p></blockquote>

    <h4>Multi line blockquote with a cite reference:</h4>
    <blockquote><p>People think focus means saying yes to the thing you’ve got to focus on. But that’s not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully. I’m actually as proud of the things we haven’t done as the things I have done. Innovation is saying no to 1,000 things. <cite>Steve Jobs – Apple Worldwide Developers’ Conference, 1997</cite></p></blockquote>
  </section>

  <section class="sg-section">
    <h2 class="sg-section-header">Tables</h2>
    <table>
      <tbody>
      <tr>
        <th>Employee</th>
        <th class="views">Salary</th>
        <th></th>
      </tr>
      <tr>
        <td><a href="http://john.do/">John Saddington</a></td>
        <td>$1</td>
        <td>Because that’s all Steve Job’ needed for a salary.</td>
      </tr>
      <tr>
        <td><a href="http://tommcfarlin.com/">Tom McFarlin</a></td>
        <td>$100K</td>
        <td>For all the blogging he does.</td>
      </tr>
      <tr>
        <td><a href="http://jarederickson.com/">Jared Erickson</a></td>
        <td>$100M</td>
        <td>Pictures are worth a thousand words, right? So Tom x 1,000.</td>
      </tr>
      <tr>
        <td><a href="http://chrisam.es/">Chris Ames</a></td>
        <td>$100B</td>
        <td>With hair like that?! Enough said…</td>
      </tr>
      </tbody>
    </table>
  </section>

  <section class="sg-section">
    <h2 class="sg-section-header">Lists</h2>

    <h3>Unordered Lists (Nested)</h3>
    <ul>
      <li>List item one
        <ul>
          <li>List item one
            <ul>
              <li>List item one</li>
              <li>List item two</li>
              <li>List item three</li>
              <li>List item four</li>
            </ul>
          </li>
          <li>List item two</li>
          <li>List item three</li>
          <li>List item four</li>
        </ul>
      </li>
      <li>List item two</li>
      <li>List item three</li>
      <li>List item four</li>
    </ul>

    <h3>Ordered List (Nested)</h3>
    <ol>
      <li>List item one
        <ol>
          <li>List item one
            <ol>
              <li>List item one</li>
              <li>List item two</li>
              <li>List item three</li>
              <li>List item four</li>
            </ol>
          </li>
          <li>List item two</li>
          <li>List item three</li>
          <li>List item four</li>
        </ol>
      </li>
      <li>List item two</li>
      <li>List item three</li>
      <li>List item four</li>
    </ol>

    <h3>Definition Lists</h3>
    <dl>
      <dt>Definition List Title</dt>
      <dd>Definition list division.</dd>
      <dt>Startup</dt>
      <dd>A startup company or startup is a company or temporary organization designed to search for a repeatable and scalable business model.</dd>
      <dt>#dowork</dt>
      <dd>Coined by Rob Dyrdek and his personal body guard Christopher “Big Black” Boykins, “Do Work” works as a self motivator, to motivating your friends.</dd>
      <dt>Do It Live</dt>
      <dd>I’ll let Bill O’Reilly <a title="We'll Do It Live" href="https://www.youtube.com/watch?v=O_HyZ5aW76c">explain this one</a>.</dd>
    </dl>
  </section>
