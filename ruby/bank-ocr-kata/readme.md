# Original Description (from the Coding Dojo wiki)

(see http://codingdojo.org/kata/BankOCR/)

This Kata was presented at XP2006 by EmmanuelGaillot and ChristopheThibaut.

## Problem Description

### User Story 1

You work for a bank, which has recently purchased an ingenious machine to assist in reading letters and faxes sent in by branch offices. The machine scans the paper documents, and produces a file with a number of entries which each look like this:

<pre>
    _  _     _  _  _  _  _ 
  | _| _||_||_ |_   ||_||_|
  ||_  _|  | _||_|  ||_| _|
</pre>

Each entry is 4 lines long, and each line has 27 characters. The first 3 lines of each entry contain an account number written using pipes and underscores, and the fourth line is blank. Each account number should have 9 digits, all of which should be in the range 0-9. A normal file contains around 500 entries.

Your first task is to write a program that can take this file and parse it into actual account numbers.

### User Story 2

Having done that, you quickly realize that the ingenious machine is not in fact infallible. Sometimes it goes wrong in its scanning. The next step therefore is to validate that the numbers you read are in fact valid account numbers. A valid account number has a valid checksum. This can be calculated as follows:

<pre>
account number:  3  4  5  8  8  2  8  6  5
position names:  d9 d8 d7 d6 d5 d4 d3 d2 d1
</pre>

checksum calculation:

(d1 + 2\*d2 + 3\*d3 +..+ 9\*d9) mod 11 = 0

So now you should also write some code that calculates the checksum
for a given number, and identifies if it is a valid account number.

### User Story 3

Your boss is keen to see your results. He asks you to write out a file
of your findings, one for each input file, in this format:

<pre>
457508000
664371495 ERR
86110??36 ILL
</pre>

ie. the file has one account number per row. If some characters are
illegible, they are replaced by a ?. In the case of a wrong checksum,
or illegible number, this is noted in a second column indicating
status.

### User Story 4

It turns out that often when a number comes back as ERR or ILL it is
because the scanner has failed to pick up on one pipe or underscore
for one of the figures. For example

<pre>
    _  _  _  _  _  _     _ 
|_||_|| || ||_   |  |  ||_ 
  | _||_||_||_|  |  |  | _|
</pre>

The 9 could be an 8 if the scanner had missed one |. Or the 0 could be
an 8. Or the 1 could be a 7. The 5 could be a 9 or 6. So your next
task is to look at numbers that have come back as ERR or ILL, and try
to guess what they should be, by adding or removing just one pipe or
underscore. If there is only one possible number with a valid
checksum, then use that. If there are several options, the status
should be AMB. If you still can't work out what it should be, the
status should be reported ILL.

## Clues

I recommend finding a way to write out 3x3 cells on 3 lines in your
code, so they form an identifiable digits. Even if your code actually
doesn't represent them like that internally. I'd much rather read

<pre>
"   " +
"|_|" +
"  |"
</pre>

than

<pre>
"   |_|  |"
</pre>

anyday.

When Christophe and Emmanuel presented this Kata at XP2005 they worked
on a solution that made extensive use of recursion rather than
iteration. Many people are more comfortable with iteration than
recursion. Try this kata both ways.

### Some gotchas to avoid:

- be very careful to read the definition of checksum correctly. It is
  not a simple dot product, the digits are reversed from what you
  expect.

- The spec does not list all the possible alternatives for valid
  digits when one pipe or underscore has been removed or added

- don't forget to try to work out what a ? should have been by adding
  or removing one pipe or underscore.

## Suggested Test Cases

If you want to just copy and paste these test cases into your editor,
I suggest first clicking "edit this page" so you can see the source.
Then you can be sure to copy across all the whitespace necessary. Just
don't save any changes by mistake.

### use case 1

<pre>
 _  _  _  _  _  _  _  _  _ 
| || || || || || || || || |
|_||_||_||_||_||_||_||_||_|

=> 000000000
                           
  |  |  |  |  |  |  |  |  |
  |  |  |  |  |  |  |  |  |

=> 111111111
 _  _  _  _  _  _  _  _  _ 
 _| _| _| _| _| _| _| _| _|
|_ |_ |_ |_ |_ |_ |_ |_ |_ 

=> 222222222
 _  _  _  _  _  _  _  _  _ 
 _| _| _| _| _| _| _| _| _|
 _| _| _| _| _| _| _| _| _|

=> 333333333

                           
|_||_||_||_||_||_||_||_||_|
  |  |  |  |  |  |  |  |  |

=> 444444444
 _  _  _  _  _  _  _  _  _ 
|_ |_ |_ |_ |_ |_ |_ |_ |_ 
 _| _| _| _| _| _| _| _| _|

=> 555555555
 _  _  _  _  _  _  _  _  _ 
|_ |_ |_ |_ |_ |_ |_ |_ |_ 
|_||_||_||_||_||_||_||_||_|

=> 666666666
 _  _  _  _  _  _  _  _  _ 
  |  |  |  |  |  |  |  |  |
  |  |  |  |  |  |  |  |  |

=> 777777777
 _  _  _  _  _  _  _  _  _ 
|_||_||_||_||_||_||_||_||_|
|_||_||_||_||_||_||_||_||_|

=> 888888888
 _  _  _  _  _  _  _  _  _ 
|_||_||_||_||_||_||_||_||_|
 _| _| _| _| _| _| _| _| _|

=> 999999999
    _  _     _  _  _  _  _ 
  | _| _||_||_ |_   ||_||_|
  ||_  _|  | _||_|  ||_| _|

=> 123456789
</pre>

### use case 3
<pre>
 _  _  _  _  _  _  _  _    
| || || || || || || ||_   |
|_||_||_||_||_||_||_| _|  |

=> 000000051
    _  _  _  _  _  _     _ 
|_||_|| || ||_   |  |  | _ 
  | _||_||_||_|  |  |  | _|

=> 49006771? ILL
    _  _     _  _  _  _  _ 
  | _| _||_| _ |_   ||_||_|
  ||_  _|  | _||_|  ||_| _ 

=> 1234?678? ILL
</pre>

### use case 4
<pre>
                           
  |  |  |  |  |  |  |  |  |
  |  |  |  |  |  |  |  |  |

=> 711111111
 _  _  _  _  _  _  _  _  _ 
  |  |  |  |  |  |  |  |  |
  |  |  |  |  |  |  |  |  |

=> 777777177
 _  _  _  _  _  _  _  _  _ 
 _|| || || || || || || || |
|_ |_||_||_||_||_||_||_||_|

=> 200800000
 _  _  _  _  _  _  _  _  _ 
 _| _| _| _| _| _| _| _| _|
 _| _| _| _| _| _| _| _| _|

=> 333393333
 _  _  _  _  _  _  _  _  _ 
|_||_||_||_||_||_||_||_||_|
|_||_||_||_||_||_||_||_||_|

=> 888888888 AMB ['888886888', '888888880', '888888988']
 _  _  _  _  _  _  _  _  _ 
|_ |_ |_ |_ |_ |_ |_ |_ |_ 
 _| _| _| _| _| _| _| _| _|

=> 555555555 AMB ['555655555', '559555555']
 _  _  _  _  _  _  _  _  _ 
|_ |_ |_ |_ |_ |_ |_ |_ |_ 
|_||_||_||_||_||_||_||_||_|

=> 666666666 AMB ['666566666', '686666666']
 _  _  _  _  _  _  _  _  _ 
|_||_||_||_||_||_||_||_||_|
 _| _| _| _| _| _| _| _| _|

=> 999999999 AMB ['899999999', '993999999', '999959999']
    _  _  _  _  _  _     _ 
|_||_|| || ||_   |  |  ||_ 
  | _||_||_||_|  |  |  | _|

=> 490067715 AMB ['490067115', '490067719', '490867715']
    _  _     _  _  _  _  _ 
 _| _| _||_||_ |_   ||_||_|
  ||_  _|  | _||_|  ||_| _|

=> 123456789
 _     _  _  _  _  _  _    
| || || || || || || ||_   |
|_||_||_||_||_||_||_| _|  |

=> 000000051
    _  _  _  _  _  _     _ 
|_||_|| ||_||_   |  |  | _ 
  | _||_||_||_|  |  |  | _|

=> 490867715
</pre>

## Node.js v16 File I/O Code Snippets

Code samples for reading and writing files in Node.js to help accelerate your coding:

### Example 1: Read whole file into memory

Relevant docs:
- [fsPromises.readFile](https://nodejs.org/api/fs.html#fs_fspromises_readfile_path_options)
- [fsPromises.writeFile](https://nodejs.org/api/fs.html#fs_fspromises_writefile_file_data_options)

```javascript
import { readFile, writeFile } from "fs/promises";

const inputFile = "path/to/infile";
const outputFile = "path/to/outfile";

async function main() {
  // Async read contents of file into memory.
  const fileContents = await readFile(inputFile, {
    encoding: "utf8", // specifying an encoding returns the file contents as a string
  });

  const dataToSave = magicalDataTransformer(fileContents);

  // Async write data to a file, replacing the file if it already exists.
  await writeFile(outputFile, dataToSave, { encoding: "utf8" });
}
```

### Example 2: Streaming I/O

_By default, Node.js will read 64KB of data per chunk._

Relevant docs:

- [fs.createReadStream](https://nodejs.org/docs/latest-v16.x/api/fs.html#fs_fs_createreadstream_path_options)
    * [fs.ReadStream](https://nodejs.org/docs/latest-v16.x/api/fs.html#fs_class_fs_readstream)
    * [stream.Readable](https://nodejs.org/docs/latest-v16.x/api/stream.html#stream_class_stream_readable)
    * [stream.Readable.pipe](https://nodejs.org/docs/latest-v16.x/api/stream.html#stream_readable_pipe_destination_options)
- [fs.createWriteStream](https://nodejs.org/docs/latest-v16.x/api/fs.html#fs_fs_createwritestream_path_options)
    - [fs.WriteStream](https://nodejs.org/docs/latest-v16.x/api/fs.html#fs_class_fs_writestream)
    - [stream.Writable](https://nodejs.org/docs/latest-v16.x/api/stream.html#stream_class_stream_writable)
- [streams.pipeline](https://nodejs.org/docs/latest-v16.x/api/stream.html#stream_stream_pipeline_source_transforms_destination_callback)
- [streams.Transform constructor](https://github.com/nodejs/node/blob/1150cfe6ebf44541581e87682141905b6750439f/lib/internal/streams/transform.js#L81)

```javascript
import { createReadStream, createWriteStream } from "fs";
import { pipeline, Transform } from "stream";

const inputFile = "path/to/infile";
const outputFile = "path/to/outfile";

const readStream = createReadStream(inputFile, { encoding: "utf8" });
const writeStream = createWriteStream(outputFile, { encoding: "utf8" });

const myTransformStream = new Transform({
  transform(chunkBuffer, _encoding, callback) {
    const chunkStr = chunkBuffer.toString("utf8");

    chunkStr.split("\n").forEach((line) => {
      // this.push(data) for the next Stream in the pipeline
      this.push(line + "--line-transform--\n");
    });

    // NOTE: must call; callback(err, optionalMessage)
    callback(null, "done with chunk\n");
  },
});

// Manually pipe the streams

readStream.pipe(myTransformStream).pipe(writeStream);

writeStream.on("close", () => {
  console.log("pipeline done");
});

// OR use the stream.pipeline() function

pipeline(readStream, myTransformStream, writeStream, (err) => {
  if (err) {
    console.error("pipeline failed:", err);
    process.exit(1);
  } else {
    console.log("pipeline success");
  }
});
```